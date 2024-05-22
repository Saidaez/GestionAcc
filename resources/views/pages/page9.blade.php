@extends('auth.layouts')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Compliance base porteuse (</h1>
        
        <!-- Search Form -->
        <form action="{{ route('searchp9') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search here">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                </div>
            </div>
        </form>

        <!-- Import Excel Button -->
        @if(Auth::user()->role == 'admin')
            <div class="mb-3">
                <form action="{{ route('importExcel9') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="excel_file" required>
                    <button type="submit" class="btn btn-success">Importer Excel</button>
                </form>
            </div>
        @endif

        <!-- Delete Excel File Button -->
        @if(Auth::user()->role == 'admin')
            <div class="mb-3">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Supprimer le fichier Excel</button>
            </div>
        @endif

     <!-- Table -->
     <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="bg-light">Mabec</th>
                <th class="bg-light">Description</th>
                <th class="bg-light">prix</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->Mabec}}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->prix }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $items->links() }}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmation de suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer le fichier Excel?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <form action="{{ route('deleteExcel9') }}" method="POST" id="deleteExcelForm">
                        @csrf
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection