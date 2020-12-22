<section class="content">
  <div class="row">
    <div class="col-12">
      <?php if ($this->session->flashdata('status') == 1): ?>
        <div class="alert alert-success">
          <strong>Data Success Added!</strong>
        </div>
      <?php endif ?>
      <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
          <table id="contact" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>no</th>
                <th>name</th>
                <th>email</th>
                <th>subject</th>
                <th>Description</th>
                <th>file</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($this->db->get('contact')->result() as $contact): ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $contact->name; ?></td>
                <td><?php echo $contact->email; ?></td>
                <td><?php echo $contact->subject; ?></td>
                <td><?php echo $contact->description; ?></td>
                <td><?php echo '<a href="'.base_url('public/img/contact/'.$contact->file).'" >'.$contact->file.'</a>'; ?></td>
                <td><?php echo $contact->date; ?></td>
              </tr>
            <?php endforeach ?>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>