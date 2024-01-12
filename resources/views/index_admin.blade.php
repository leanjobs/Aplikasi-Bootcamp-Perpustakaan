@extends('layouts.main_index_admin')
@section('main_index')
    {{-- content --}}
    <div class="container-fluid py-4">
        <div class="container-fluid py-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#createBuku">
                Tambah Buku
            </button>
            @include('partials.buku.create_buku')
            <div class="row">
              <div class="col-12">
                <div class="card mb-4">
                  <div class="card-header pb-0">
                    <h6>Peminjaman Buku</h6>
                  </div>
                  <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                      <!-- <form action="{{route('dashboard_admin')}}" method="post" enctype="multipart/form-data">
                      @csrf -->
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul Buku</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penerbit</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penulis</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok Buku</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($bukus as $buku)
                          <tr>
                            <td>
                                @if($buku->image)
                                <img src="{{ asset('storage/' .$buku->image ) }}" alt="" class="rounded mb-0 ps-3" style="width: 150px;">
                                @else
                                <img src="https://pngtree.com/freepng/no-image-vector-illustration-isolated_4979075.html" alt="" class="rounded" style="width: 150px;">
                                @endif
                            </td>
                            <td>
                                <p class="text-xs text-secondary mb-0 ps-3">{{ $buku->judul }}</p>
                            </td>
                              <td>
                                <p class="text-xs text-secondary mb-0 ps-3">{{ $buku->penerbit }}</p>
                            </td>
                            <td>
                                <p class="text-xs text-secondary mb-0 ps-3">{{ $buku->pengarang }}</p>
                            </td>
                            <td>
                                <p class="text-xs text-secondary mb-0 ps-3">{{ $buku->stok_buku }}</p>
                              </td>
                            <td class="d-flex">
                                <form action="{{ route("buku.delete", $buku->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mx-1">Delete</button>

                                </form>
                                 <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editBuku_{{ $buku->id }}" data-book-id={{ $buku->id }}>
                                    Edit buku
                                </button>
                                @include('partials.buku.edit_buku')
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <!-- </form> -->
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection
