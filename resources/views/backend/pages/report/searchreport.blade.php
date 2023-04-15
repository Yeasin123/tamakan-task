@extends('backend.admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-2">Search Orders Report</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card pd-20 pd-sm-40 mg-t-50 mb-3">
                    <h3>Search By Date</h3>
                  <form action="{{route('searchbyday')}}" method="GET">
                    <div class="form-group">
                        <input type="date" name="day" class="form-control">
                    </div>
                    <div class="form-group">
                       <button type="submit" class="btn btn-primary btn-sm">Search</button>
                    </div>
                  </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card pd-20 pd-sm-40 mg-t-50 mb-3">
                    <h3>Search By Month</h3>
                  <form action="{{route('searchbymonth')}}" method="GET">
                    <div class="form-group">
                        <select name="month" class="form-control">
                            <option value="">Choose Month</option>
                            <option value="january">January</option>
                            <option value="february">February</option>
                            <option value="march">March</option>
                            <option value="april">April</option>
                            <option value="may">May</option>
                            <option value="june">June</option>
                            <option value="july">July</option>
                            <option value="august">August</option>
                            <option value="september">September</option>
                            <option value="october">October</option>
                            <option value="november">November</option>
                            <option value="december">December</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Search</button>
                     </div>
                  </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card pd-20 pd-sm-40 mg-t-50 mb-3">
                    <h3>Search By Year</h3>
                  <form action="{{route('searchbyear')}}" method="GET">
                    <div class="form-group">
                        <select name="year" class="form-control">
                            <option value="">Choose Year</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                            <option value="2031">2031</option>
                            <option value="2032">2032</option>
                            <option value="2033">2033</option>
                            <option value="2034">2034</option>
                            <option value="2035">2035</option>
                            <option value="2036">2036</option>
                            <option value="2037">2037</option>
                            <option value="2038">2038</option>
                            <option value="2039">2039</option>
                            <option value="2040">2040</option>
                        </select>    
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Search</button>
                     </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
 
@endsection