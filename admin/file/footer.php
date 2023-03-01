</section>
        <!-- Section General -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="pull-left "> <b>تم بكل حب من قبل  <a target="_blank" href="https://api.whatsapp.com/send?phone=0021096328124&text=السلام عليكم&app_absent=0">حلول قوي</a></b> </div>
    <strong>كل الحقوق محفوظة &copy; <?php echo date(Y); ?> </strong> </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li></li>
      <li></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab"></div>
      <div class="tab-pane" id="control-sidebar-stats-tab"></div>
      <div class="tab-pane" id="control-sidebar-settings-tab"></div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="dist/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="dist/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="dist/js/jquery.dataTables.min.js"></script>
<script src="dist/js/dataTables.bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="dist/js/jquery.sparkline.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="dist/js/bootstrap3-wysihtml5.all.min.js"></script>
<!-- AdminScript App -->
<script src="dist/js/AdminScript.min.js"></script>
<!-- AdminScript dashboard demo (This is only for demo purposes) -->
<script src="dist/js/dashboard.js"></script>
<!-- Select -->
<script src="dist/js/select.full.min.js"></script>
<script src="dist/js/project_build.js"></script>
<script src="dist/js/commission.js"></script>
<!-- AdminScript for skins purposes -->
<script src="dist/js/skins.js"></script>
<script src="dist/js/whatsApp.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.2.0/js/dataTables.rowGroup.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      dir: "rtl",
      })

  })
</script>
<script>
  $(function () {
    $('#TableForm').DataTable({
       dom: 'Bfrtip',



        lengthMenu: [
            [10, 25, 50,100, -1],
            [10, 25, 50,100, 'All'],
        ],
        buttons: [
            'copy', 'csv', 'excel',  'print', 'pageLength'
        ],
      "columnDefs": [
        {"className": "dt-center", "targets": "_all"}
      ],
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'order'       : [[ 0, "desc" ]],
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<!--<script>-->
<!--$(document).ready(function(){-->
<!---->
<!--//  function load_unseen_notification(view = '')-->
<!--//  {-->
<!--//   $.ajax({-->
<!--//   url:"fetch.php",-->
<!--//   method:"POST",-->
<!--//   data:{view:view},-->
<!--//   dataType:"json",-->
<!--//   success:function(data)-->
<!--//   {-->
<!--//     $('.dropdown-noty').html(data.notification);-->
<!--//     if(data.unseen_notification > 0)-->
<!--//     {-->
<!--//      $('.count').html(data.unseen_notification);-->
<!---->
<!--//     }-->
<!--//   }-->
<!--//   });-->
<!--//  }-->
<!---->
<!--//  load_unseen_notification();-->
<!---->
<!--//  $(document).on('click', '.toggle', function(){-->
<!--//   $('.count').html('');-->
<!--//   load_unseen_notification('yes');-->
<!--//  });-->
<!---->
<!--//  setInterval(function(){-->
<!--//   load_unseen_notification();-->
<!--//  }, 5000);-->
<!---->
<!--// });-->
<!---->
<!--</script>-->

</body>

</html>
