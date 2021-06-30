@extends('home')

@section('content')

{{-- <div class="container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddModal">
        add
    </button>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ukuran</th>
            <th scope="col">tinggi</th>
            <th scope="col">jumlah</th>

        </tr>
        </thead>
        <tbody>
            @foreach ($files as $file)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $file->ukuran }}</td>
                    <td>{{ $file->tinggi }}</td>
                    <td>{{ $file->jumlah }}</td>

                    
                </tr>  
            @endforeach
            
        </tbody>
    </table>
    

    <form action="" id="update_stockkotak_form" method="post" enctype="multipart/form-data">
        @csrf   
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="update_ukuran">ukuran</label>
            <select class="form-control" id="update_ukuran" name="ukuran"> 
                <option selected disabled>-----choose-----</option>
                @foreach ($files->unique('ukuran') as $file)
                    <option value={{$file->ukuran}}>{{$file->ukuran}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="update_tinggi">tinggi</label>
            <select class="form-control" id="update_tinggi" name="tinggi"> 
                <option selected disabled>-----choose-----</option>
                
            </select>
        </div>
        <div id="update_jumlah"></div>

        <input type="text" name="jumlah" id="">

        <button class="btn btn-primary" type="submit">enter</button>
    </form>
</div>

<div class="modal fade" id="AddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="AddModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="AddModalLabel">Modal title</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/stockkotak" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="input_ukuran">ukuran</label>
                    <select class="form-control" id="input_ukuran" name="ukuran">
                        <option value="small">small</option>
                        <option value="medium">medium</option>
                        <option value="large">large</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="input_tinggi">tinggi</label>
                    <input type="text" name="tinggi" id="input_tinggi">
                </div>
                <div class="form-group">
                    <label for="input_jumlah">jumlah</label>
                    <input type="text" name="jumlah" id="input_jumlah">
                </div>
                <button type="submit">enter</button>
            </form>
        </div>
      </div>
    </div>
</div> --}}

@endsection