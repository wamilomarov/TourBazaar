@extends('admin.panel')

@section('content')
    <div class="content-section">
        <div class="container-liquid">
            <div class="row">
                <div class="col-xs-2">
                    <div class="stat-box colorfour">
                        <i class="users">&nbsp;</i>
                        <h4>New requests</h4>
                        <h1>23</h1>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="stat-box colortwo">
                        <i class="chart">&nbsp;</i>
                        <h4>Overall requests up to date</h4>
                        <h1>1288</h1>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="stat-box colorthree">
                        <i class="pages">&nbsp;</i>
                        <h4>Tours</h4>
                        <h1>125</h1>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="sec-box">
                        <a class="closethis">Close</a>
                        <header>
                            <h2 class="heading">Data Tables</h2>
                        </header>
                        <div class="contents">
                            <a class="togglethis">Toggle</a>
                            <div class="table-box">
                                <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
                                <div id="example_wrapper" class="dataTables_wrapper" role="grid">
                                    <div id="example_length" class="dataTables_length"><label>Show <select size="1"
                                                                                                           name="example_length"
                                                                                                           aria-controls="example">
                                                <option value="10" selected="selected">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries</label></div>
                                    <div class="dataTables_filter" id="example_filter"><label>Search all columns: <input
                                                    type="text" aria-controls="example"></label></div>
                                    <table class="display table dataTable" id="example" aria-describedby="example_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                                rowspan="1" colspan="1" style="width: 163px;"
                                                aria-label="Rendering engine: activate to sort column ascending">
                                                Rendering engine
                                            </th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                                rowspan="1" colspan="1" style="width: 164px;"
                                                aria-label="Browser: activate to sort column ascending">Browser
                                            </th>
                                            <th class="sorting_desc" role="columnheader" tabindex="0"
                                                aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                aria-sort="descending"
                                                aria-label="Platform(s): activate to sort column ascending">Platform(s)
                                            </th>
                                            <th class="center sorting" role="columnheader" tabindex="0"
                                                aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                aria-label="Engine version: activate to sort column ascending">Engine
                                                version
                                            </th>
                                            <th class="center sorting" role="columnheader" tabindex="0"
                                                aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                aria-label="CSS grade: activate to sort column ascending">CSS grade
                                            </th>
                                            <th class="center sorting" role="columnheader" tabindex="0"
                                                aria-controls="example" rowspan="1" colspan="1" style="width: 164px;"
                                                aria-label="Action: activate to sort column ascending">Action
                                            </th>
                                        </tr>
                                        </thead>

                                        <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1"><input type="text" name="search_engine"
                                                                               value="Search engines"
                                                                               class="search_init"></th>
                                            <th rowspan="1" colspan="1"><input type="text" name="search_browser"
                                                                               value="Search browsers"
                                                                               class="search_init"></th>
                                            <th rowspan="1" colspan="1"><input type="text" name="search_platform"
                                                                               value="Search platforms"
                                                                               class="search_init"></th>
                                            <th rowspan="1" colspan="1"><input type="text" name="search_version"
                                                                               value="Search versions"
                                                                               class="search_init"></th>
                                            <th rowspan="1" colspan="1"><input type="text" name="search_grade"
                                                                               value="Search grades"
                                                                               class="search_init"></th>
                                        </tr>
                                        </tfoot>
                                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        <tr class="gradeA odd">
                                            <td class="">Trident</td>
                                            <td class=" ">Internet Explorer 7</td>
                                            <td class="  sorting_1">Win XP SP2+</td>
                                            <td class="center ">7</td>
                                            <td class="center ">A</td>
                                            <td class="center "><button type="button" href="{{url('acceptTour')}}" class="btn btn-success">Accept</button></td>
                                        </tr>
                                        <tr class="gradeA even">
                                            <td class="">Trident</td>
                                            <td class=" ">AOL browser (AOL desktop)</td>
                                            <td class="  sorting_1">Win XP</td>
                                            <td class="center ">6</td>
                                            <td class="center ">A</td>
                                        </tr>
                                        <tr class="gradeA odd">
                                            <td class="">Gecko</td>
                                            <td class=" ">Netscape Browser 8</td>
                                            <td class="  sorting_1">Win 98SE+</td>
                                            <td class="center ">1.7</td>
                                            <td class="center ">A</td>
                                        </tr>
                                        <tr class="gradeA even">
                                            <td class="">Gecko</td>
                                            <td class=" ">Firefox 1.0</td>
                                            <td class="  sorting_1">Win 98+ / OSX.2+</td>
                                            <td class="center ">1.7</td>
                                            <td class="center ">A</td>
                                        </tr>
                                        <tr class="gradeA odd">
                                            <td class="">Gecko</td>
                                            <td class=" ">Firefox 1.5</td>
                                            <td class="  sorting_1">Win 98+ / OSX.2+</td>
                                            <td class="center ">1.8</td>
                                            <td class="center ">A</td>
                                        </tr>
                                        <tr class="gradeA even">
                                            <td class="">Gecko</td>
                                            <td class=" ">Firefox 2.0</td>
                                            <td class="  sorting_1">Win 98+ / OSX.2+</td>
                                            <td class="center ">1.8</td>
                                            <td class="center ">A</td>
                                        </tr>
                                        <tr class="gradeA odd">
                                            <td class="">Gecko</td>
                                            <td class=" ">Netscape Navigator 9</td>
                                            <td class="  sorting_1">Win 98+ / OSX.2+</td>
                                            <td class="center ">1.8</td>
                                            <td class="center ">A</td>
                                        </tr>
                                        <tr class="gradeA even">
                                            <td class="">Gecko</td>
                                            <td class=" ">Seamonkey 1.1</td>
                                            <td class="  sorting_1">Win 98+ / OSX.2+</td>
                                            <td class="center ">1.8</td>
                                            <td class="center ">A</td>
                                        </tr>
                                        <tr class="gradeA odd">
                                            <td class="">Gecko</td>
                                            <td class=" ">Mozilla 1.7</td>
                                            <td class="  sorting_1">Win 98+ / OSX.1+</td>
                                            <td class="center ">1.7</td>
                                            <td class="center ">A</td>
                                        </tr>
                                        <tr class="gradeA even">
                                            <td class="">Gecko</td>
                                            <td class=" ">Mozilla 1.8</td>
                                            <td class="  sorting_1">Win 98+ / OSX.1+</td>
                                            <td class="center ">1.8</td>
                                            <td class="center ">A</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="dataTables_info" id="example_info">Showing 1 to 10 of 39 entries</div>
                                    <div class="dataTables_paginate paging_two_button" id="example_paginate"><a
                                                class="paginate_disabled_previous" tabindex="0" role="button"
                                                id="example_previous" aria-controls="example">Previous</a><a
                                                class="paginate_enabled_next" tabindex="0" role="button"
                                                id="example_next" aria-controls="example">Next</a></div>
                                </div>
                                <script>
                                    var asInitVals = new Array();
                                    $(document).ready(function () {
                                        var oTable = $('#example').dataTable({
                                            "oLanguage": {
                                                "sSearch": "Search all columns:"
                                            }
                                        });

                                        $("tfoot input").keyup(function () {
                                            /* Filter on the column (the index) of this element */
                                            oTable.fnFilter(this.value, $("tfoot input").index(this));
                                        });


                                        /*
                                         * Support functions to provide a little bit of 'user friendlyness' to the textboxes in
                                         * the footer
                                         */
                                        $("tfoot input").each(function (i) {
                                            asInitVals[i] = this.value;
                                        });

                                        $("tfoot input").focus(function () {
                                            if (this.className == "search_init") {
                                                this.className = "";
                                                this.value = "";
                                            }
                                        });

                                        $("tfoot input").blur(function (i) {
                                            if (this.value == "") {
                                                this.className = "search_init";
                                                this.value = asInitVals[$("tfoot input").index(this)];
                                            }
                                        });
                                    });

                                </script>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
    </div>

@endsection