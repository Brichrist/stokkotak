<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Box App</title>
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
        <label for="nav-toggle">
          <i class="bi bi-list"></i>
        </label>
        <h1></h1>
      </header>

      <main>
        <section id="dashboard">
          <div class="information">
            <div class="information-solo bg-primary">
              <div>
                <h1>52</h1>
                <p>Total Boxs</p>
              </div>
            </div>

            <div class="information-solo bg-secondary">
              <div>
                <h1>30</h1>
                <p>Small Box</p>
              </div>
            </div>

            <div class="information-solo bg-ternary">
              <div>
                <h1>22</h1>
                <p>Medium Box</p>
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
                  <tr>
                    <td>Kotak 26x26</td>
                    <td>Medium</td>
                    <td>20</td>
                    <td>10</td>
                  </tr>
                  <tr>
                    <td>Kotak 24x24</td>
                    <td>Small</td>
                    <td>25</td>
                    <td>3</td>
                  </tr>
                  <tr>
                    <td>Kotak 30x30</td>
                    <td>Large</td>
                    <td>30</td>
                    <td>1</td>
                  </tr>
                  <tr>
                    <td>Kotak 30x30</td>
                    <td>Large</td>
                    <td>20</td>
                    <td>5</td>
                  </tr>
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
                <select id="category" name="category">
                  <option value="small">Small</option>
                  <option value="medium">Medium</option>
                  <option value="large">Large</option></select
                ><br />
              </div>
              <div class="form-element">
                <label for="height">Choose height:</label><br />
                <select id="height" name="height">
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">22</option></select
                ><br />
              </div>
            </form>
            <p>Quantity: ....</p>
          </div>

          <div class="table-responsive">
            <button type="button">Add Box</button>
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
                <tr>
                  <td>Kotak 26x26</td>
                  <td>Medium</td>
                  <td>20</td>
                  <td>
                    10 <button><i class="bi bi-dash-circle"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>Kotak 24x24</td>
                  <td>Small</td>
                  <td>25</td>
                  <td>
                    3 <button><i class="bi bi-dash-circle"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>Kotak 30x30</td>
                  <td>Large</td>
                  <td>30</td>
                  <td>
                    1 <button><i class="bi bi-dash-circle"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>Kotak 30x30</td>
                  <td>Large</td>
                  <td>20</td>
                  <td>
                    5 <button><i class="bi bi-dash-circle"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div id="myModal" class="modal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <!-- FORM 2 -->
              <form id="formAdd">
                <h2>Add Box to Inventory</h2>
                <label for="inputTinggi">Height</label>
                <input type="text" id="inputTinggi" placeholder="e.g. 25" />
                <label for="inputCategory">Category</label>
                <select id="inputCategory" name="inputCategory">
                  <option value="small">Small</option>
                  <option value="medium">Medium</option>
                  <option value="large">Large</option>
                </select>
                <button>Add Box</button>
              </form>
            </div>
          </div>
        </section>
      </main>
    </div>
    <script src="{{ asset('js/script.js')}}"></script>
  </body>
</html>
