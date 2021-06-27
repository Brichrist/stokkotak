<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('css/style.css') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset('asset') }}/css/editsate.css"> --}}
    <script src="https://kit.fontawesome.com/472c7ba5af.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" />




    <title>Document</title>
</head>
<body>
    <div class="container">
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
    </div>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/CSSRulePlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('js/style.js') }}"></script>


</body>
</html>

 