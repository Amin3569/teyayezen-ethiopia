<h1> <?php echo $_settings->info('name') ?></h1>
<hr>
<div class="row">
        <div class="col-12 col-sm-4 col-md-4 col-sm-12 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total students</span>
                <span class="info-box-number">
                <?php 
                    $student = $conn->query("SELECT * FROM student_list where delete_flag = 0")->num_rows;
                    echo format_num($student);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
        </div>

