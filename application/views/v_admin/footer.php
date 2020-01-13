<!-- 	<div class="col-md-12 bg-white text-center p-3" style="box-shadow: 0rem -0.15rem 0.25rem 0.15rem rgba(0, 0, 0, 0.075) !important;">
		All Rights Reserved &copy; Neithroid 2019
	</div> -->

</body>
	<script type="text/javascript">
	    $('.alert').alert().delay(3000).slideUp('slow');
	</script>

	<script type="text/javascript">
    	function goBack() 
    	{
      		window.history.back();
    	}
  	</script>

	<script type="text/javascript">
		$(document).ready(function(){
        $("#tambah").modal('<?php echo $modal ?>');
    });
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
	    $('#table-datatable').DataTable( {	
	    	"search": {
			    "caseInsensitive": true
			  },
	    	fixedHeader: true,
	    	responsive: true,
		    	language: {
		        searchPlaceholder: "Cari...",
		        sSearch: "Cari : ",
		        sEmptyTable: "Tidak ada data tercatat",
		        sInfo: "Menampilkan Data ke-_START_ Sampai ke-_END_ dari _TOTAL_ total data",
		        sLengthMenu: "Menampilkan _MENU_ data",
		        sInfoFiltered: "(Disaring dari total _MAX_ data)",
		        sInfoEmpty: "Menampilkan data ke-0 sampai ke-0 dari total 0 data",
		    	},
	    	} );
		} );
	</script>

	<script type="text/javascript">
	$(document).ready(function() {
    $('#info-trans').DataTable( {
    	scrollY: 200,
    	scrollCollapse: true,
    	paging: false,
    	info: false,
    	responsive: true,
    	language: {
        searchPlaceholder: "Cari...",
		        sSearch: "Cari : ",
		        sEmptyTable: "Tidak ada data tercatat",
		        sInfo: "Menampilkan Data ke-_START_ Sampai ke-_END_ dari _TOTAL_ total data",
		        sLengthMenu: "Menampilkan _MENU_ data",
		        sInfoFiltered: "(Disaring dari total _MAX_ data)",
		        sInfoEmpty: "Menampilkan data ke-0 sampai ke-0 dari total 0 data",
    	}
    	 } );
	} );
	</script>

    <script type="text/javascript">
    $(document).ready(function() {
    $('#trans').DataTable( {
        scrollCollapse: true,
        paging: false,
        info: false,
        responsive: true,
        language: {
        searchPlaceholder: "Cari...",
                sSearch: "Cari : ",
                sEmptyTable: "Tidak ada data tercatat",
                sInfo: "Menampilkan Data ke-_START_ Sampai ke-_END_ dari _TOTAL_ total data",
                sLengthMenu: "Menampilkan _MENU_ data",
                sInfoFiltered: "(Disaring dari total _MAX_ data)",
                sInfoEmpty: "Menampilkan data ke-0 sampai ke-0 dari total 0 data",
        }
         } );
    } );
    </script>

	<script type="text/javascript">
	$(document).ready(function() {
    $('#riwayat-trans').DataTable( {
    	scrollY: 200,
    	scrollCollapse: true,
    	paging: false,
    	info: false,
    	responsive: true,
    	language: {
        searchPlaceholder: "Cari...",
		        sSearch: "Cari : ",
		        sEmptyTable: "Tidak ada data tercatat",
		        sInfo: "Menampilkan Data ke-_START_ Sampai ke-_END_ dari _TOTAL_ total data",
		        sLengthMenu: "Menampilkan _MENU_ data",
		        sInfoFiltered: "(Disaring dari total _MAX_ data)",
		        sInfoEmpty: "Menampilkan data ke-0 sampai ke-0 dari total 0 data",
    	}
    	 } );
	} );
	</script>

<script type="text/javascript">
	$(document).ready(function() {
    $('#table-laporan').DataTable( {
    	
    	/* scrollY:        700, */
    	/* Row Group  
    	order: [[2, 'asc']],
        rowGroup: {
            dataSrc: 2
        }, 
        */

        /* Scroll
        scrollX:        true,
        scrollCollapse: true, */
        paging:         true,
        // select: true,
        /*fixedColumns:   true, */
        dom: 'Bfrtip',
        responsive: true,
        fixedHeader: true,
        colReorder: true,
        language: {
                searchPlaceholder: "Cari...",
                sSearch: "Cari : ",
                sEmptyTable: "Tidak ada data tercatat",
                sInfo: "Menampilkan Data ke-_START_ Sampai ke-_END_ dari _TOTAL_ total data",
                sLengthMenu: "Menampilkan _MENU_ data",
                sInfoFiltered: "(Disaring dari total _MAX_ data)",
                sInfoEmpty: "Menampilkan data ke-0 sampai ke-0 dari total 0 data",
                },

        buttons: [
        {
            extend: 'copy',
            text: '<i class="fas fa-copy"></i> Copy',
        },
        /* PDF */
        // {
        // 	extend: 'pdf',
        // 	text: '<span class="glyphicon glyphicon-file"></span> PDF',
        // },
        
        {
        	extend: 'excel',
        	text: '<i class="fas fa-file-excel"></i> Excel',
        },
        /* Print */
      //   {
      //       extend: 'print',
      //       text: '<span class="glyphicon glyphicon-print"></span> Print',
      //       title: '<div style="background-image: url(<?php echo base_url().'assets/bg/74215489_p0.png'; ?>); width: 100%; height: 150px; background-position: center;"></div>',
      //       autoPrint: true,
      //       exportOptions: {
      //       columns: ':visible'
	    	// }
      //   }, 
        // 'colvis',
        ],
        "search": {
                "caseInsensitive": false
              },
        columnDefs: [ {
            targets: -1,
            visible: false
				} ],
				"columnDefs": [
                { "type": "numeric-comma", targets: -1 }
            ],


    } );
} );
</script>
</httml>