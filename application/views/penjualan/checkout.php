<div class="modal fade" id="pembayaranModal">
   <div class="modal-dialog">
     <div class="modal-content">

       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
         </button>
         <h4 class="modal-title" id="inputKasModal">Pembayaran</h4>
       </div>
       <div class="modal-body">
         <form class="form-horizontal" method="post" action="<?php echo base_url('penjualan/simpanpenjualan') ?>">
           <div class="form-group">
             <input type="hidden" class="form-control" name="kasir" id="kasir" readonly>
             <input type="hidden" class="form-control" name="kary" id="kary" readonly>
             <input type="hidden" class="form-control" name="cus" id="cus" readonly>
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Total</label>
             <div class="col-md-9 col-sm-9 col-xs-12">
               <input type="text" class="form-control" name="subtotal" id="subtotal" readonly>
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Diskon (Rp)</label>
             <div class="col-md-9 col-sm-9 col-xs-12">
               <input type="text" class="form-control" name="diskon1" id="diskon1" autocomplete="off" readonly>
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">PPN</label>
             <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
               <input type="text" class="form-control has-feedback-left" name="nominal_ppn" id="nominal_ppn" readonly>
               <span class="form-control-feedback left" aria-hidden="true"><b>Rp</b></span>
             </div>
             <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
               <input type="text" class="form-control" name="ppn_persen" id="ppn_persen" autocomplete="off">
               <span class="form-control-feedback right" aria-hidden="true"><b>%</b></span>
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Grand Total</label>
             <div class="col-md-9 col-sm-9 col-xs-12">
               <input type="text" class="form-control" name="grandtotal" id="grandtotal" readonly>
               <input type="hidden" class="form-control" name="nominal" id="nominal" readonly>
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Bayar</label>
             <div class="col-md-9 col-sm-9 col-xs-12">
               <input type="text" class="form-control" name="bayar" id="bayar" autocomplete="off">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Kembali</label>
             <div class="col-md-9 col-sm-9 col-xs-12">
               <input type="text" class="form-control" name="kembali" id="kembali" readonly autocomplete="off">
             </div>
           </div>
           <p class="text-right"><i>Harga diatas sudah termasuk PPN 10%</i></p>
           <div class="modal-footer">
             <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
             <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak dan Simpan</button>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>