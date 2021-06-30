<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/filter.css') }}" rel="stylesheet">

    <title>Box App</title>
    @laravelPWA
  </head>
  <body>
    <input type="checkbox" id="nav-toggle" checked />
    <div class="sidebar">
      <div class="sidebar-brand">
        <img src="{{asset('/images/box.png')}}" alt="" />
        <h1>Venov Box</h1>
      </div>

      <div class="sidebar-menu">
        <ul>
          <li>
            <a href="#dashboard" class="dashboard-link active">
              <i class="bi bi-house-door-fill"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="#inventory" class="inventory-link">
              <i class="bi bi-archive-fill"></i>
              <span>Inventory</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-content">
      <header>
        <div>
          <label for="nav-toggle">
            <i class="bi bi-list"></i>
          </label>
          <h1></h1>
        </div>
        <div class="mode">
          <i class="bi bi-lightbulb-off-fill bi-lightbulb-fill"></i>
        </div>
      </header>

      <main>
        <section id="dashboard">
          <div class="information">
            <div class="information-solo bg-primary">
              <div>
                <h1>
                <?php $number = 0 ?>
                @foreach ($files->where('ukuran','large') as $file)
                  <?php $number = $number+($file->jumlah) ?>
                @endforeach
                {{$number}}
                </h1>
                <p>Large Box</p>
              </div>
            </div>

            <div class="information-solo bg-secondary">
              <div>
                <h1>
                <?php $number = 0 ?>
                @foreach ($files->where('ukuran','medium') as $file)
                  <?php $number = $number+($file->jumlah) ?>
                @endforeach
                {{$number}}
                </h1>
                <p>Medium Box</p>
              </div>
            </div>

            <div class="information-solo bg-ternary">
              <div>
                <h1>
                <?php $number = 0 ?>
                @foreach ($files->where('ukuran','small') as $file)
                  <?php $number = $number+($file->jumlah) ?>
                @endforeach
                {{$number}}
                </h1>
                <p>Small Box</p>
              </div>
            </div>
          </div>

          <div class="list-box">
            <h1>List of Boxes</h1>
            <div class="table-responsive">
              <table width="100%">
                <thead>
                  <tr>
                    <td>Name</td>
                    <td>Category</td>
                    <td>Height</td>
                    <td>Quantity</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($files as $file)
                    <tr>
                      @if ($file->ukuran=="large")
                        <td>Kotak 30x30</td>
                      @elseif($file->ukuran=="medium")
                        <td>Kotak 26x26</td>
                      @else
                        <td>Kotak 24x24</td>      
                      @endif
                      <td>{{ $file->ukuran }}</td>
                      <td>{{ $file->tinggi }}</td>
                      <td>{{ $file->jumlah }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </section>

        <section id="inventory">
          <div class="search-box">
            <h2><i class="bi bi-search">search box...</i></h2>
            <!-- FORM 1 -->
            <form id="formSearch">
              <div class="form-element">
                <label for="category">Choose category:</label><br />
                <select id="category" name="ukuran">
                  <option selected disabled>-----choose-----</option>
                  @foreach ($files->unique('ukuran') as $file)
                      <option value={{$file->ukuran}}>{{$file->ukuran}}</option>
                  @endforeach
                </select>
                <br />
              </div>
              <div class="form-element">
                <label for="height">Choose height:</label><br />
                <select id="height" name="tinggi">
                  <option selected disabled>-----choose-----</option>
                </select>
                <br />
              </div>
            </form>
            <p>Quantity:  <span id="quantity">...</span></p>
          </div>

          <div class="table-responsive">
            <button type="button">Add Box</button>
            <ul>
              <li class="list active" data-filter="all">All</li>
              @foreach ($files->unique('ukuran') as $file)
              <li class="list" data-filter="{{ $file->ukuran }}">{{ $file->ukuran }}</li>
              @endforeach
              </ul>
              <ul>
              @foreach ($files->unique('tinggi')->sortBy('tinggi') as $file)
              <li class="list" data-filter="{{ $file->tinggi}}">{{ $file->tinggi }}</li>
              @endforeach
            </ul>
            <table width="100%">
              <thead>
                <tr>
                  <td>Name</td>
                  <td>Category</td>
                  <td>Height</td>
                  <td>Quantity</td>
                </tr>
              </thead>
              <tbody>
              @foreach ($files as $file)
                <tr class="itemBox" data-item="{{ $file->ukuran }}" data-item1="{{ $file->tinggi }}">
                  @if ($file->ukuran=="large")
                    <td>Kotak 30x30</td>
                  @elseif($file->ukuran=="medium")
                    <td>Kotak 26x26</td>
                  @else
                    <td>Kotak 24x24</td>      
                  @endif
                  <td>{{ $file->ukuran }}</td>
                  <td>{{ $file->tinggi }}</td>
                  <td>
                  <button class="buttonupdate {{ $file->id }} negative" ><i class="bi bi-dash-circle"></i></button>
                  <div class="value">{{ $file->jumlah }}</div>
                  <button class="buttonupdate {{ $file->id }} positive"><i class="bi bi-plus-circle"></i></button>
                  </td>
                  </tr>
              @endforeach
              </tbody>
            </table>
          </div>

          <div id="myModal" class="modal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <!-- FORM 2 -->
              <form id="formAdd" action="/stockkotak" method="post" enctype="multipart/form-data">
                @csrf
                <h2>Add Box to Inventory</h2>
                <label for="inputTinggi">Height</label>
                <input type="text"  name="tinggi" id="inputTinggi" placeholder="e.g. 25" />
                <label for="inputCategory">Category</label>
                <select class="form-control" id="inputCategory" name="ukuran">
                  <option value="small">Small</option>
                  <option value="medium">Medium</option>
                  <option value="large">Large</option>
                </select>
                <div class="form-group">
                  <label for="inputJumlah">jumlah</label>
                  <input type="text" name="jumlah" id="inputJumlah" placeholder="e.g. 5">
                </div>
                <button type="submit">Add Box</button>
              </form>
            </div>
          </div>
        </section>
      </main>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="{{ asset('js/script.js')}}"></script>
    <script src="{{ asset('js/style.js') }}"></script>
    <script src="{{ asset('js/filter.js')}}"></script>


  </body>
</html>
