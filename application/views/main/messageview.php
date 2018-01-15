<?php
/**
 * Created by PhpStorm.
 * User: Sin Vuthy
 * Date: 12/24/2017
 * Time: 4:27 PM
 */
?>

<div class="row m-t-md">
    <div class="col-md-12">
        <div class="row mailbox-header">
            <div class="col-md-2">
                <a href="<?php echo base_url();?>main/compose" class="btn btn-success btn-block">Compose</a>
            </div>
            <div class="col-md-6">
                <h2>View Message</h2>
            </div>
            <div class="col-md-4">
                <form action="#" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control input-search" placeholder="Search...">
                        <span class="input-group-btn">
                                                <button class="btn btn-success" type="button"><i class="fa fa-search"></i></button>
                                            </span>
                    </div><!-- Input Group -->
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <ul class="list-unstyled mailbox-nav">
            <li><a href="<?php echo base_url();?>main/inbox"><i class="fa fa-inbox"></i>Inbox <span class="badge badge-success pull-right">4</span></a></li>
            <li><a href="#"><i class="fa fa-sign-out"></i>Sent</a></li>
            <li><a href="#"><i class="fa fa-file-text-o"></i>Draft</a></li>
            <li><a href="#"><i class="fa fa-exclamation-circle"></i>Spam</a></li>
            <li><a href="#"><i class="fa fa-trash"></i>Trash</a></li>
        </ul>
    </div>
    <div class="col-md-10">
        <div class="panel panel-white">
            <div class="panel-body mailbox-content">
                <div class="message-header">
                    <h3><span>Subject:</span> Nullam quis risus eget urna mollis ornare vel eu leo</h3>
                    <p class="message-date">21/03/15</p>
                </div>
                <div class="message-sender">
                    <img src="assets/images/avatar2.png" alt="">
                    <p>Sandra Smith <span>&lt;example@mail.com&gt;</span></p>
                </div>
                <div class="message-content">
                    <p>Hi David !<br><br>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula. Cum sociis natoque <a href="#">penatibus</a> et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla.<br><br>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis <b>natoque penatibus</b> et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>
                </div>
                <div class="message-attachments">
                    <p><i class="fa fa-paperclip m-r-xs"></i>2 Attachments - <a href="#">View all</a> | <a href="#">Download all</a></p>
                    <div class="message-attachment">
                        <a href="#">
                            <div class="attachment-content">
                                <img src="assets/images/attachment1.jpg" alt="">
                            </div>
                            <div class="attachment-info">
                                <p>Attachment1.jpg</p>
                                <span>444 KB</span>
                            </div>
                        </a>
                    </div>
                    <div class="message-attachment">
                        <a href="#">
                            <div class="attachment-content">
                                <img src="assets/images/attachment2.jpg" alt="">
                            </div>
                            <div class="attachment-info">
                                <p>Attachment2.jpg</p>
                                <span>548 KB</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="message-options pull-right">
                    <a href="compose.html" class="btn btn-default"><i class="fa fa-reply m-r-xs"></i>Reply</a>
                    <a href="#" class="btn btn-default"><i class="fa fa-arrow-right m-r-xs"></i>Forward</a>
                    <a href="#" class="btn btn-default"><i class="fa fa-print m-r-xs"></i>Print</a>
                    <a href="#" class="btn btn-default"><i class="fa fa-exclamation-circle m-r-xs"></i>Spam</a>
                    <a href="#" class="btn btn-default"><i class="fa fa-trash m-r-xs"></i>Delete</a>
                </div>
            </div>
        </div>
    </div>
</div><!-- Row -->
