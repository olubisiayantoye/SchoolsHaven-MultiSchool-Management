
    <!--Banner-->
    <section>
        <div class="csi-banner csi-banner-inner">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-heading-area">
                                <div class="csi-heading csi-heading-white">
                                    <h2 class="title"><?php echo $this->lang->line('contact_us'); ?></h2>
                                </div>
                                <ul class="breadcrumb">
                                    <li><a href="index.html"><i class="icon-home6"></i><?php echo $this->lang->line('home'); ?></a></li>
                                    <li><a href="news-list.html"><i class="icon-home6"></i>Edumater</a></li>
                                    <li class="active"><?php echo $this->lang->line('contact_us'); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div><!--//.ROW-->
                </div>
                <!-- //.container -->
            </div>
        </div>
    </section>
    <!--Banner END-->
<section>
    <div class="container text-center">        
        <?php $this->load->view('layout/message'); ?> 
    </div>
</section>


<section>
        <div id="csi-contact" class="csi-contact">
            <div class="csi-inner">
                <div class="contact-top-area">
                    <div class="contact-top-left">
                        <div class="contact-info">
                            <div class="csi-box">
                                <span class="csi-icon"><i class="icofont icofont-phone"></i></span>
                                <div class="address">
                                    <p>+2545-8546-XXX</p>
                                    <p>+2545-8546-XXX</p>
                                </div>
                            </div>
                            <div class="csi-box">
                                <span class="csi-icon"><i class="icofont icofont-envelope"></i></span>
                                <div class="address">
                                    <p>Email:<a href="https://httpcoder.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6a00020504440e050f2a0f120b071a060f44090507">[email&#160;protected]</a></p>
                                    <p><a href="https://httpcoder.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4c26242322622823290c29342d213c20297e622f2321">[email&#160;protected]</a></p>
                                </div>
                            </div>
                            <div class="csi-box">
                                <span class="csi-icon"><i class="icofont icofont-map"></i></span>
                                <div class="address">
                                    <p>123 Grand Tower - 45 Street Name,
                                        City Name, United State</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-top-right">
                        <div class="innerpage-section">
                            <div class="csimapcanvas map-canvas-default" id="map_canvas"> </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-8">
                            <form method="POST" class="csi-contactform" action="https://httpcoder.com/demo/html/edumaster/view/php/form-handler.php">
                                <div class="form-group">
                                    <input type="text" name="csiname" class="form-control csiname" id="csiname" placeholder="Enter Your Name ..." required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="csiemail" class="form-control csiemail" id="csiemail" placeholder="Enter Email address ..." required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="csisubject" class="form-control csisubject" id="csisubject" placeholder="Enter Email Subject ..." required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control csimessage" name="csimessage" id="csimessage" rows="5" placeholder="Leave me A Massage ..." required></textarea>
                                </div>
                                <button type="submit" name="submit" value="contact-form" class="csi-btn hvr-glow hvr-radial-out csisend csi-send">Send Massage</button>
                            </form>
                            <!-- MODAL SECTION -->
                            <div id="csi-form-modal" class="modal fade csi-form-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content csi-modal-content">
                                        <div class="modal-header csi-modal-header">
                                            <button type="button" class="close brand-color-hover" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-power-off"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert csi-form-msg" role="alert"></div>
                                        </div> <!--//MODAL BODY-->
                                    </div>
                                </div>
                            </div> <!-- //MODAL -->
                        </div> <!--//.COL-->
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
