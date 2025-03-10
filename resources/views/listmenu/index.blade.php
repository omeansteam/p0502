@extends('listmenu.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Daftar Produk</h2>
            </div>
        </div>
        <div class="col-lg-3 margin-tb">
            <div class="pull-left">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Cari barang">
                </div>
            </div>
        </div>
        <div class="col-lg-3 margin-tb">
            <div class="pull-left">
                <div class="form-group">
                    <select name="kategori" class="form-control">
                        <option value="">Semua</option>
                        @foreach ($icon_menus as $obj_icon)
                        <option value="{{ $obj_icon->name }}">{{ $obj_icon->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-6 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="/listmenuexport/export_excel"> export</a>
                <a class="btn btn-danger" href="{{ route('listmenu.create') }}"> Tambah Produk</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Nama Produk</th>
            <th>Kategori Produk</th>
            <th>Harga Beli (Rp)</th>
            <th>Harga Jual (Rp)</th>
            <th>Stok Produk</th>
            <!-- <th>Details</th> -->
            <th width="280px">Action</th>
        </tr>
        @foreach ($listmenu as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->image }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->icon_name }}</td>
            <td>{{ $product->hargabeli }}</td>
            <td>{{ $product->hargajual }}</td>
            <td>{{ $product->stok }}</td>
            <!-- <td>{{ $product->detail }}</td> -->
            <td>
                <form action="{{ route('listmenu.destroy',$product->id) }}" method="POST">
   
                    <!-- <a class="btn btn-info" href="{{ route('listmenu.show',$product->id) }}">Show</a> -->
    
                    <a class="btn btn-primary" href="{{ route('listmenu.edit',$product->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $listmenu->links() !!}
      
@endsection