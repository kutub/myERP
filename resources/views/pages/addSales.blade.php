@extends('layouts.app')

@section('content')
<section class="content-header">
      
        <h1>
          
          Add Sales
        
        </h1>
  
        <ol class="breadcrumb">
          
          <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
          
          <li class="active">Dashboard</li>
        
        </ol>
  
      </section>
  
      <section class="content">
  
        <div class="box">
  
          <div class="box-header with-border">
  
            <h3 class="box-title">Title</h3>
  
            <div class="box-tools pull-right">
  
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
  
                <i class="fa fa-minus"></i>
  
              </button>
  
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                
                <i class="fa fa-times"></i>
  
              </button>
  
            </div>
  
          </div>
  
          <div class="box-body">
  
          
  
  
          <div class="container-fluid">
    <div class="row">
      <div class="col-sm-8">
        <div class="box box-info">
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-4">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                  <!-- select -->
                    <select class="form-control">
                      <option>option 1</option>
                      <option>option 2</option>
                      <option>option 3</option>
                      <option>option 4</option>
                      <option>option 5</option>
                    </select>
                    </div>
                  </div>
                  </div>
                  <div class="col-xs-4">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                  <!-- select -->
                    <select class="form-control">
                      <option>option 1</option>
                      <option>option 2</option>
                      <option>option 3</option>
                      <option>option 4</option>
                      <option>option 5</option>
                    </select>
                    </div>
                  </div>
                  </div>
                  <div class="col-xs-4">
                    <div class="float-right"> 
                      <button type="button" style="margin-left:15px" class="btn btn-primary btn-sm pull-right">Suspended</button>
                    <button type="button" class="btn btn-sm bg-olive pull-right">Daily Sales</button>
                 
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
  
            <div class="box box-success">
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-9">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label"> Find or Scan Item or Receipt</label>
                    <div class="col-sm-8" style="position:relative;">
                    <input type="text" name="query" class="form-control" id="productSearch" placeholder="Start typing Item Name or scan Barcode...">
                    <div id="productList" style="position:absolute; top:33px;left:15px;right:15px;"></div>
                    </div>
                  </div>
                  </div>
                
                  <div class="col-xs-3">
                    <div class="float-right"> 
                      <button type="button" style="margin-left:15px" class="btn btn-info btn-sm pull-right">New Item</button>
                 
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
  
          <div class="box-body">
  
          <table class="table table-bordered table-striped dt-responsive " id="productTable" width="100%">
         
            <thead>
             
             <tr>
               
               <th style="width:10px">#</th>
               <th>Item #</th>
               <th>Item Name</th>
               <th style="width:80px">Price</th>
               <th style="width:80px">Quantity</th>
               <th style="width:100px">Discount</th>
               <th>Total</th>
               <th>Actions</th>
  
             </tr> 
  
            </thead>
  
            <tbody>
            <?php
  
                $item = null; 
                $value = null;
  
                $users = ControllerSales::ctrShowSalesProducts($item, $value);
  
                  //  var_dump($users);
  
                foreach ($users as $key => $value) {
  
                      echo '<tr class="allSaleItem">'; 
                          echo '<td itemId="'.$value["id"].'">'.($key+1).'</td>';
                          echo '<td pCode="'.$value["pCode"].'">'.$value["pCode"].'</td>';
                          echo '<td pName="'.$value["pName"].'">'.$value["pName"].'</td>';
                          echo '<td sPrice="'.$value["sPrice"].'"><input type="text" name="sPrice" saleId="'.$value["id"].'" value="'.$value["sPrice"].'" class="form-control input-sm sPrice"></td>';
                          echo '<td sQuantity="'.$value["sQuantity"].'"><input type="text" name="sQuantity" saleId="'.($key+1).'"  value="'.$value["sQuantity"].'" class="sQuantity form-control input-sm"></td>';
                          echo '<td sDiscount="'.$value["sDiscount"].'">
                                  <div class="input-group">
                                      <input type="text" name="sDiscount" saleId="'.($key+1).'" value="'.$value["sDiscount"].'" class="sDiscount form-control input-sm">
                                      <span class="input-group-addon">%</span>
                                  </div>
                                 </td>';
                          echo '<td tPrice="'.$value["totalPrice"].'" class="totalSalePrice" productId="'.$value["id"].'">'.$value["totalPrice"].'</td>';
                          echo '<td>
                                  <div class="btn-group center">
                                      <button class="btn btn-warning btnEditUser" idUser="'.$value["id"].'" data-toggle="modal" data-target="#editUser"><i class="fa fa-pencil"></i></button>
                                      <button class="btn btn-danger btnDeleteSaleItem" saleId="'.$value["id"].'" username="'.$value["pName"].'"><i class="fa fa-times"></i></button>
                                  </div>  
                                </td>';
  
                      echo '</tr>';
                 };
  
              ?>
            </tbody>
  
          </table>
  
          <div >
  
          </div>
  
        </div>
      </div>

      
      <div class="col-sm-4">
  
      <div class="box box-info">
        <div class="center-block mt-5">
          <h4 class="text-center">Select Customer (Optional)</h4>
            <input type="text" name="query" class="form-control" id="productSearch" placeholder="Start typing customer details...">
            <button type="button" style="margin-top:10px; margin-bottom:10px;" class="mt-1 mb-5 btn btn-sm bg-olive center-block"><span class="glyphicon glyphicon-user">&nbsp;</span> New Customer</button>
        </div>
        <div class="table-responsive">
            <?php  
  
              $tSum = 'totalPrice';
              $tShow = "sumsale";
              $qSum = "sQuantity";
              $qShow = "totalQnt";
  
              $quantity = ControllerSales::ctrSumSale($qSum, $qShow);
              $total = ControllerSales::ctrSumSale($tSum, $tShow);
              echo '<table class="table" id="paymentTable">
                <tr>
                    <th style="width:50%">Quantity of '.$quantity[0]["totalQnt"] .' Items</th>
                    <td class="pull-right"><strong id="pQnt">'.$quantity[0]["totalQnt"] .'</strong></td>
                </tr>
                <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td class="pull-right"><strong>'.$total[0]["sumsale"] . ' Tk</strong></td>
                </tr>
                <tr>
                  <th style="font-size:1em;color:red;">Payments Total:</th>
                  <td class="pull-right" style="font-size:1.5em;color:red;"><strong id="payment">'.$total[0]["sumsale"] . '</strong>Tk</td>
                </tr>
                <tr>
                  <th>Given Amount:</th>
                  <td class="pull-right"><input type="text" name="given" class="form-control input-sm" id="given" placeholder="type"></td>
                </tr>
                <tr>
                  <th>To Return:</th>
                  <td class="pull-right" id="toreturn" style="font-size:1.5em;color:red;">0</td>
                </tr>
                <tr style="border-top:2px solid #333;">
                  <th>Payment Type</th>
                  <td style="width:30%">
                    <select class="form-control btn-sm input-sm">
                          <option>Cash</option>
                          <option>Debit Card</option>
                          <option>Credit Card</option>
                          <option>Due</option>
                          <option>Check</option>
                          <option>Gift Card</option>
                    </select>
                </td>
                <tr>
                  <th>Amount Tendered:</th>
                  <td class="pull-right"><input type="text" name="amount_tendered" class="form-control input-sm non-giftcard-input" id="amount_tendered" placeholder="type"></td>
                </tr>
                </tr>
                <tr style="">
                  <th></th>
                  <td> <button class="btn btn-sm btn-success pull-right" id="add_payment_button" tabindex="7"><span class="glyphicon glyphicon-credit-card">&nbsp;</span>Add Payment</button></td>
                </tr>
              </table>';
              ?>
            </div>
          <div class="btn btn-sm btn-default pull-left mt-3" id="suspend_sale_button">
            <span class="glyphicon glyphicon-align-justify">&nbsp;</span>Suspend
          </div>
          <div class="btn btn-sm btn-danger pull-right mt-3" id="cancel_sale_button"><span class="glyphicon glyphicon-remove">&nbsp;</span>Cancel</div>
      </div>
      </div>
    </div>
  </div>
  </div>
</div>
  
      </section>
@endsection
