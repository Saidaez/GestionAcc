@extends('auth.layouts')

@section('content')
<style>
    /* تأثير الحدود عند التحويل (hover) */
    img:hover {
        border: 2px solid gray;
        /* لون الحدود الرمادي */
    }

    a.btn {
        margin-right: 10px;
        margin-bottom: 10px;
        margin-left: 10px;
        margin-top: 10px;
    }

    /* وسائط الاعلام لظهور الأزرار عند تصغير حجم الشاشة */
    @media screen and (max-width: 768px) {
        .navbar-nav {
            display: none;
            /* إخفاء قائمة الأزرار */
        }

        .show-buttons {
            display: block !important;
            /* إظهار الأزرار الإضافية */
        }
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h1>
                        Bienvenu {{$name}}
                    </h1>
                </div>

                <div class="card-body">
                <div class="row">
    <div class="col-md-4 mb-3">
        <a href="{{ url('page1') }}" class="btn btn-light btn-block">Indexage table à rouleaux</a>
    </div>
    <div class="col-md-4 mb-3">
        <a href="{{ url('page2') }}" class="btn btn-light btn-block">Moteur entraînement rouleaux</a>
    </div>
    <div class="col-md-4 mb-3">
        <a href="{{ url('page3') }}" class="btn btn-light btn-block">Compliance lugette</a>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <a href="{{ url('page4') }}" class="btn btn-light btn-block">Indexage base porteuse</a>
    </div>
    <div class="col-md-4 mb-3">
        <a href="{{ url('page5') }}" class="btn btn-light btn-block">Entraineur</a>
    </div>
    <div class="col-md-4 mb-3">
        <a href="{{ url('page6') }}" class="btn btn-light btn-block">Index balancelle</a>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <a href="{{ url('page7') }}" class="btn btn-light btn-block">Table élévatrice</a>
    </div>
    <div class="col-md-4 mb-3">
        <a href="{{ url('page8') }}" class="btn btn-light btn-block">Index base porteuse sur caisse</a>
    </div>
    <div class="col-md-4 mb-3">
        <a href="{{ url('page9') }}" class="btn btn-light btn-block">Compliance base porteuse</a>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <a href="{{ url('page10') }}" class="btn btn-light btn-block">Marteaux</a>
    </div>
    <div class="col-md-4 mb-3">
        <a href="{{ url('page11') }}" class="btn btn-light btn-block">Verrouillage base porteuse</a>
    </div>
    <div class="col-md-4 mb-3">
        <a href="{{ url('page12') }}" class="btn btn-light btn-block">Moteur Entraînement mât</a>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <a href="{{ url('page13') }}" class="btn btn-light btn-block">Approche Plateau</a>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Button to create an account - Only for admin -->
    @if(Auth::user()->role == 'admin')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <a href="{{ route('register') }}" class="btn btn-primary btn-block">Créer un compte pour un nouvel utilisateur</a>
        </div>
    </div>
    @elseif(Auth::user()->role == 'employee')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <a href="{{ route('employeeDashboard') }}" class="btn btn-primary btn-block"></a>
        </div>
    </div>
    @endif

    <!-- Table to display employees -->
    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Liste des utilisateurs</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Actions</th> <!-- تمت إضافة هذا العنوان -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                @if(Auth::user()->role == 'admin')
                                <td>
                                    <!-- Button to trigger the modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal{{ $employee->id }}">Supprimer</button>
                                </td>
                                @endif
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="confirmDeleteModal{{ $employee->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel{{ $employee->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $employee->id }}">Confirmation de suppression</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Êtes-vous sûr de vouloir supprimer ce utilisateur?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <form action="{{ route('deleteEmployee') }}" method="POST" id="deleteEmployeeForm{{ $employee->id }}">
                                                @csrf
                                                <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle delete button click inside the modal
        $('.btn-delete').on('click', function() {
            // Get the employee id associated with the button
            var employeeId = $(this).data('employee-id');

            // Set the action of the form to the delete route
            $('#deleteEmployeeForm' + employeeId).attr('action', "{{ route('deleteEmployee') }}");

            // Submit the delete form
            $('#deleteEmployeeForm' + employeeId).submit();
        });
    });
</script>
@endsection