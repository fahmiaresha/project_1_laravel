        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Kategori</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Poin Of Sales</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <form class="form-horizontal form-label-left" action="#" method="POST">

                      <div class="item form-group ">
                        <label class="control-label col-md-2 col-sm-2 col-xs-2" for="categoriesid"> Categories Id
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input id="categoriesid" class="form-control col-md-3 col-xs-3" data-validate-length-range="6" 
                          data-validate-words="2" name="categoriesid" readonly required="required" 
                          type="text">
                        </div>

                       
                      <div class="item form-group ">
                      </div>

                      <div class="item form-group ">
                        <div class="col-md col-sm col-xs">
                          <input id="productid" class="form-control col-md col-xs" data-validate-length-range="6" 
                          data-validate-words="2" name="productid" placeholder="Enter Your Product Id" required="required" 
                          type="text">
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="x_content">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>  
                          <th></th>
                          <th>Nama Product</th>
                          <th width="150px">Jumlah</th>
                          <th>Harga [Rp]</th>
                          <th>Sub Total [Rp]</th>
                        </tr>
                      </thead>


                      <tbody>
                        <tr>
                          <td>
                            <a href="SalesDetailCreate" class="close-link"><i class="fa fa-close">
                          </td>
                          <td>Tiger Nixon</td>
                          <td width="150px"><button class="btn btn-success"> - </button><input size="2" type="text" > </input><button class="btn btn-success"> + </button></td>
                          <td>Rp 320.800</td>
                          <td>Rp 320.800</td>
                          </i>
                          </a>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
            
            <div class="x_content">
              
              <form class="form-horizontal form-label-left" >
                <div class="col-md-6 col-sm-12 col-xs-12">

                              <div class="item form-group ">
                                <div class="col-md-1 col-sm-1 col-xs-1">
                                  <label class="control-label col-md-1 col-sm-1 col-xs-1" for="categoriesname">Sub Total</label>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-7">
                                  <label class="control-label col-md-6 col-sm-6 col-xs-6" for="categoriesname">Rp 0</label>
                                </div>
                              </div>
  
                              <div class="item form-group ">
                                <div class="col-md-1 col-sm-1 col-xs-1">
                                  <label class="control-label col-md-1 col-sm-1 col-xs-1" for="categoriesname">Pajak (10%)</label>
                                </div>  
                                <div class="col-md-7 col-sm-7 col-xs-7">
                                  <label class="control-label col-md-6 col-sm-6 col-xs-6" for="categoriesname">Rp 0</label>
                                </div>
                              </div>

                              <div class="item form-group ">
                                <div class="col-md-1 col-sm-1 col-xs-1">
                                  <label class="control-label col-md-1 col-sm-1 col-xs-1" for="categoriesname">Discount</label>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-7">
                                  <label class="control-label col-md-6 col-sm-6 col-xs-6" for="categoriesname">Rp 0</label>
                                </div>
                              </div>
                </div>
                              <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="x_panel" style="width:75%;height:150px">
                                  <label class="control-label col-md-1 col-sm-1 col-xs-1" for="categoriesname">TOTAL</label>
                              </div>
                            </div>

              </form>
            </div>

                </div>
              </div>
            </div>
          </div>
          