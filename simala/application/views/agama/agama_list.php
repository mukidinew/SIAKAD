<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-4">
            <h2 style="margin-top:0px"><h3><?php echo $title_page; ?></h3></h2>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px"  id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-4 text-right">
            <?php echo anchor(site_url('agama/create'), 'Create', 'class="btn btn-primary"'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
        <thead>
            <tr>
                <th width="80px">No</th>
        		    <th>Agama</th>
        		    <th>Action</th>
            </tr>
        </thead>
	       <tbody>
            <?php
            $start = 0;
            foreach ($agama_data as $agama)
            {
                ?>
            <tr>
      		    <td><?php echo ++$start ?></td>
      		    <td><?php echo $agama->agama ?></td>
              <td style="text-align:center" width="200px">
                <a href='<?php echo site_url('agama/read/'.$agama->id_agama) ?>'><i class='fa fa-eye'></i></a> |
                <a href='<?php echo site_url('agama/update/'.$agama->id_agama) ?>'><i class='fa fa-pencil-square-o'></i></a> |
                <a href='<?php echo site_url('agama/delete/'.$agama->id_agama) ?>' onclick='javasciprt: return confirm("Are You Sure ?")'><i class='fa fa-trash-o'></i></a>
              </td>
	          </tr>
                <?php
            }
            ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
