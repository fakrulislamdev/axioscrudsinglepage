@extends('admin.master')
@section('title')
Dashboard
@stop
@push('css')
<!-- Responsive and DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('master_content') 
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-header"> <span>Nations</span>
                <button class="btn btn-sm btn-primary pull-right"  data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i> Add New</button>
                </div>

                <div class="card-body">
                  <table class="table table-bordered dataTable js-exportable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                  </table>
                  @include('admin.nations.modal')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')

<!-- Responsive and datatable js -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/axios.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready(function(){
        let base_path = window.location.origin
        function setSwalMessage(mode = 'success', title = 'Success', text = 'Data Save Successfully!') {
            Swal.fire({
                icon: mode,
                title: title,
                text: text,
            })
        }

        $(function () {
            setTimeout(function () {
                $('.message_container').fadeOut();
            },2000);
        })

        //get all nations
       function getAllNation(){
            axios.get("{{ route('get-all-row') }}")
            .then(function(res){
                //console.log(res)
                table_data_row(res.data);
              $('.dataTable').DataTable();
            })
        }
        getAllNation();
        
       //add data to table
        function table_data_row(data) {
            var	rows = '';
            var i = 0;
            $.each( data, function( key, value ) {
                value.id
                rows = rows + '<tr>';
                rows = rows + '<td>'+ ++i +'</td>';
                rows = rows + '<td>'+value.name+'</td>';
                rows = rows + '<td data-id="'+value.id+'" class="text-center">';
                rows = rows + '<a class="btn btn-sm btn-info text-light" id="editRow" data-id="'+value.id+'" data-toggle="modal" data-target="#editModal">Edit</a> ';
                rows = rows + '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="'+value.id+'" >Delete</a> ';
                rows = rows + '</td>';
                rows = rows + '</tr>';
            });
            $("#tbody").html(rows);
       }
       
       $('body').on('click','#deleteRow',function (e) {
           
            e.preventDefault();
             let id = $(this).data('id')
            let url = base_path + '/nations/' + id
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
              axios.delete(url).then(function(r){
                getAllNation();
                 swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your data has been deleted.',
                            'success'
                        )
            });
            } else if (
                    /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your file is safe :)',
                    'error'
                )
            }
        })
        });
        
        //store
        $('body').on('submit','#addNationForm',function(e){
            e.preventDefault();
            let nameError = $('#nameError')
            nameError.text('')
            axios.post("{{ route('nations.store') }}", {
                name: $('#name').val(),
            })
            .then(function (response) {

                getAllNation();
                $('#name').val('')
                setSwalMessage()
                console.log(response.data)
            $('.modal').modal('toggle')
            })
            .catch(function (error) {
                if(error.response.data.errors.name){
                    countryError.text(error.response.data.errors.name[0]);
                }
                console.log(error);
            });
         });

         //edit 
            let editCurrencyCard = $('#editNationCard')
            let addCurrencyCard = $('#addNationCard')
                editCurrencyCard.hide()

            $('body').on('click','#editRow',function(){
                let id = $(this).data('id')
                let url = base_path + '/nations' + '/'  + id + '/edit'
                    console.log(url);
                axios.get(url)
                    .then(function(res){
                        console.log(res)
                        $('#e_name').val(res.data[0].name)
                        $('#e_id').val(res.data[0].id)
                    })
            })
        
             //update
            $('body').on('submit','#updateNationForm',function(e){
                e.preventDefault()
                let id = $('#e_id').val()
                let data = {
                    id : id,
                    name : $('#e_name').val(),
                }
                let url = base_path + '/nations' + '/'  + id
                axios.put(url,data)
                .then(function(res){
                    getAllNation();
                    $('#editModal').modal('toggle')
                    setSwalMessage('success','Success','Data Update Successfully!');
                    //console.log(res);
                })
            })
    })
</script>
@endpush