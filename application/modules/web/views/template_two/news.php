 <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-dark-7" data-bg-img="images/bg/inner-header.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-theme-color-yellow font-36"><?php echo $this->lang->line('news'); ?></h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                <li><a href="javascript:void(0);"><?php echo $this->lang->line('news'); ?></a></li>
                <li class="active"><?php echo $this->lang->line('news'); ?></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container pt-70 pb-40">
        <div class="row multi-row-clearfix">
          <div class="blog-posts">
           <?php if(isset($news) && !empty($news)){ ?>
            <?php foreach($news AS $obj){ ?> 
            <div class="col-xs-12 col-sm-6 col-md-4">
              <article class="post clearfix bg-white mb-sm-30">
                <div class="entry-header">
                  <div class="post-thumb thumb"> 
                    <img src="<?php echo UPLOAD_PATH; ?>news/<?php echo $obj->image; ?>" alt="" class="img-responsive img-fullwidth">
                  </div>
                </div>
                <div class="entry-content p-20">
                  <h4 class="entry-title text-white text-uppercase"><a class="font-weight-600" href="<?php echo site_url('news-detail/'.$obj->id); ?>"><?php echo $obj->title; ?></a></h4>
                  <div class="entry-meta">
                    <ul class="list-inline font-12 mb-10">
                      <li><i class="fa fa-user text-theme-color-sky mr-5"></i><?php echo $this->lang->line('by'); ?> / <?php echo $obj->name; ?></li>
                      <li><i class="fa fa-calendar text-theme-color-sky mr-5"></i> <?php echo date($this->global_setting->date_format, strtotime($obj->date)); ?></li>
                      <li><i class="fa fa-comment-o text-theme-color-sky mr-5"></i>45 </li>
                    </ul>
                  </div>
                  <p class="mt-5"><?php echo substr($obj->news, 0, 180); ?> ...</p>
                  <a class="btn btn-theme-color-sky btn-sm mt-10" href="<?php echo site_url('news-detail/'.$obj->id); ?>"> <?php echo $this->lang->line('read_more'); ?></a>
                </div>
              </article>
            </div>
            <?php } ?>
        <?php }else{ ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
             <p class="text-center"><strong><?php echo $this->lang->line('no_data_found'); ?></strong></p>
            </div>
            <?php } ?>
            <div class="col-md-12">
              <nav>
                <ul class="pagination theme-color-sky">
                  <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a> </li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">...</a></li>
                  <li> <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a> </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->