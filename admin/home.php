<h1>Welcome to <?php echo $_settings->info('name') ?></h1>
<?php require_once('../config.php'); ?>
 <?php require_once('inc/header.php') ?>

                <!-- Main content -->
                <section class="content">
                  
                    <div class="row">
                    <div class="box">
                    <div class="col-xl-12 col-md-12"><br>
                            <div class= "card bg-primary text-white mb-6">
                                 
                                  
                            </div>
                    </div>
</div>
                    <div class="row">
                    <div class="box">
                    <div class="col-xl-12 col-md-12"><br>
                            <div class= "card bg-primary text-white mb-4">
                                  <div >
                                 
                                 
                                  
                                  </div>
</div>      
                            </div>
                    </div>
</div>  
                                <div class="col-xl-2 col-md-2"><br>
                                  <div class="info-box bg-primary text-white mb-4">
                                    <a href="#"><span class="info-box-icon bg-blue"><i class="fa fa-home"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Total Individuals</span>
                                      
                                        <?php
                                            $q = mysqli_query($conn,"SELECT * from people");
                                            $num_rows = mysqli_num_rows($q);
                                            echo '<h4 class="mb-0"> '.$num_rows.' </h4>';
                                        ?>
                                      
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>

                                <div class="col-xl-2 col-md-2"><br>
                                  <div class="info-box bg-primary text-white mb-4">
                                    <a href="#"><span class="info-box-icon bg-blue "><i class="fa fa-users"></i></span></a>

                                    <div class="info-box-content ">
                                      <span class="info-box-text">Total Establishment</span>
                                      
                                        <?php
                                            $q = mysqli_query($conn,"SELECT * from establishment");
                                            $num_rows = mysqli_num_rows($q);
                                            echo '<h4 class="mb-0"> '.$num_rows.' </h4>';
                                        ?>
                                     
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>

                            

                                <div class="col-xl-2 col-md-2"><br>
                                  <div class="info-box bg-primary text-white mb-4">
                                    <a href="#"><span class="info-box-icon bg-blue"><i class="fa fa-user"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Total Tracks</span>
                                      
                                        <?php
                                            $q = mysqli_query($conn,"SELECT * from tracks");
                                            $num_rows = mysqli_num_rows($q);
                                            echo '<h4 class="mb-0"> '.$num_rows.' </h4>';
                                        ?>
                                     
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>
                            </div><!-- /.box -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        

        <style>

.info-box {
  @include box-shadow($card-shadow);
  @include border-radius($border-radius);

  background-color: $white;
  display: flex;
  margin-bottom: map-get($spacers, 3);
  min-height: 80px;
  padding: .5rem;
  position: relative;
  width: 250px;

  .progress {
    background-color: rgba($black, .125);
    height: 2px;
    margin: 5px 0;

    .progress-bar {
      background-color: $white;
    }
  }

 

  .info-box-icon {
    @if $enable-rounded {
      border-radius: $border-radius;
    }

    align-items: center;
    display: flex;
    font-size: 1.875rem;
    justify-content: center;
    text-align: center;
    width: 70px;
    height: 60px;

    > img {
      max-width: 100%;
    }
  }

  .info-box-content {
    display: flex;
    flex-direction: column;
    justify-content: center;
    line-height: 1.8;
    flex: 1;
    padding: 0 10px;
  }

  .info-box-number {
    display: block;
    margin-top: .25rem;
    font-weight: $font-weight-bold;
  }

  .progress-description,
  .info-box-text {
    display: block;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  @each $name, $color in $theme-colors {
    .info-box {
      .bg-#{$name},
      .bg-gradient-#{$name} {
        color: color-yiq($color);

        .progress-bar {
          background-color: color-yiq($color);
        }
      }
    }
  }

  .info-box-more {
    display: block;
  }

  .progress-description {
    margin: 0;

  }

  @include media-breakpoint-up(md) {
    .col-xl-2 &,
    .col-lg-2 &,
    .col-md-2 & {
      .progress-description {
        display: none;
      }
    }

    .col-xl-3 &,
    .col-lg-3 &,
    .col-md-3 & {
      .progress-description {
        display: none;
      }
    }
  }

  @include media-breakpoint-up(lg) {
    .col-xl-2 &,
    .col-lg-2 &,
    .col-md-2 & {
      .progress-description {
        @include font-size(.75rem);
        display: block;
      }
    }

    .col-xl-3 &,
    .col-lg-3 &,
    .col-md-3 & {
      .progress-description {
        @include font-size(.75rem);
        display: block;
      }
    }
  }

  @include media-breakpoint-up(xl) {
    .col-xl-2 &,
    .col-lg-2 &,
    .col-md-2 & {
      .progress-description {
        @include font-size(1rem);
        display: block;
      }
    }

    .col-xl-3 &,
    .col-lg-3 &,
    .col-md-3 & {
      .progress-description {
        @include font-size(1rem);
        display: block;
      }
    }
  }
}

.dark-mode {
  .info-box {
    background-color: $dark;
    color: $white;
  }
}


        </style>