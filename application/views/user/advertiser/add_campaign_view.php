<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> <?php echo $title; ?> </h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="text-danger"> <?= validation_errors()."<br>".$error ?> </p>
                        <form class="forms-sample" enctype="multipart/form-data" method="post" action="<?= site_url("advertiser_dashboard/add_campaign/".$this->uri->segment(3)) ?>">
                            <input type="hidden" name="cpa_name" value="<?= (isset($campaign_name)) ? $campaign_name : "" ?>">
                            <div class="form-group">
                                <label for="exampleInputName1">Campaign Name</label>
                                <?php if(!empty($this->uri->segment(3))){?>
                                <span class="text-white"><?= $campaign_name."--" ?></span>
                                <?php } ?>
                                <input type="text" class="form-control"  value="<?= set_value('campaign_name') ?>" name="campaign_name" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleSelectGender">Campaign Category</label>
                                <select class="form-control" name="category" id="category">
                                    <option value=null selected>Choose...</option>
                                    <option value="agriculture">Agriculture</option>
                                    <option value="advertising">Advertising</option>
                                    <option value="banking">Banking & Finance</option>
                                    <option value="computers">Computers & Internet</option>
                                    <option value="e-commerce">E-commerce & Trading</option>
                                    <option value="education">Education & Learning</option>
                                    <option value="entertainment">Entertainment & Social</option>
                                    <option value="food">Food & Nutrition </option>
                                    <option value="gambling">Gambling & Betting</option>
                                    <option value="motoring">Motoring</option>
                                    <option value="marketing">Marketing & Affilate</option>
                                    <option value="manufacturing">Manufacturing & Industry </option>
                                    <option value="news">News & Media</option>
                                    <option value="sport">Sport</option>
                                    <option value="science">Science & Technology </option>
                                    <option value="product">Products & Services</option>
                                    <option value="politics">Politics</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail3">Destination Link</label>
                                <input type="text" name="destination_link" class="form-control" value="<?= (!empty($this->uri->segment(3))) ? $campaign_dest : set_value('destination_link') ?>" placeholder="www.example.com/landing_page" required <?= (!empty($this->uri->segment(3))) ? 'readonly' : '' ?>>
                            </div>

                            <div class="form-group">
                                <label for="campaign_type">Campaign Type</label>
                                <select class="form-control" id="campaign_type" name="campaign_type" onchange="typeContainer(this.value)">
                                    <option value="">Choose...</option>
                                    <option value="text">Create Text Only Campaign</option>
                                    <option value="banner">Create Banner Only Campaign</option>
                                    <option value="banner_text">Create Banner & Text Campaign</option>
                                </select>
                            </div>
                            <div class="text_only">
                                <div class="form-group">
                                    <label for="display_link">Display Link</label>
                                    <input type="text" class="form-control" name="display_link" id="display_link" value="<?= set_value("display_link") ?>" placeholder="www.example.com">
                                </div>

                                <div class="form-group">
                                    <label for="campaign_title_text">Campaign Title</label>
                                    <input type="text" class="form-control" maxlength="100" id="campaign_title_text" name="campaign_title_text" value="<?= set_value("campaign_title_text") ?>" placeholder="Ex: Advertise with custch Advertising">
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Campaign Text(Not > 160 characters)</label>
                                    <textarea class="form-control"  maxlength="140" cols="15" rows="5" name="campaign_title" id="campaign_title">
                                    <?php
                                    if(!empty(set_value('campaign_title')))
                                    {
                                        echo set_value('campaign_title');

                                    }else{
                                        echo "E.g Advertise your business online today with www.custch.com";
                                    }

                                    ?>
                                </textarea>


                                </div>
                            </div>

                            <div id="both_img" style="display: none;">
                                <div id="banner_only">
                                    <div class="form-group">
                                        <label for="campaign_size">Campaign Size/Type</label>
                                        <select class="form-control" id="campaign_size" name="campaign_size">
                                            <option value="300X250">300 X 250 (Banner Only)</option>
                                            <option value="720X90"">468 X 60 (Recommended For Mobile Campaign)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="banner_text">
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Campaign Text(Not > 140 characters)</label>
                                        <textarea class="form-control" maxlength="140" cols="15" rows="5" name="campaign_title" id="campaign_title">
                                            <?php
                                            if(!empty(set_value('campaign_title')))
                                            {
                                                echo set_value('campaign_title');

                                            }else{
                                                echo "E.g Advertise your business online today with www.custch.com";
                                            }

                                            ?>
                                </textarea>

                                    </div>
                                </div>

                                <style type="text/css">
                                    div.use {
                                        padding:5px 10px;
                                    //background:#00ad2d;
                                        border:1px solid #00ad2d;
                                        position:relative;
                                        color:#fff;
                                        border-radius:2px;
                                        text-align:center;
                                    //float:right;
                                        cursor:pointer
                                    }
                                    .hide_file {
                                        position: absolute;
                                        z-index: 1000;
                                        opacity: 0;
                                        cursor: pointer;
                                        right: 0;
                                        top: 0;
                                        height: 100%;
                                        font-size: 24px;
                                        width: 100%;

                                    }
                                </style>

                                <div class="form-group">
                                    <label>Upload Banner</label>
                                    <input type="file" name="banner" class="hide_file file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function typeContainer(id) {
                                    var textDiv = document.getElementById("text_only");
                                    var bannerDiv = document.getElementById("banner_only");
                                    var bannerTextDiv = document.getElementById("banner_text");
                                    var bothImg = document.getElementById("both_img");
                                    if(id == "text")
                                    {
                                        textDiv.className += " w3-show";
                                        bannerDiv.className = bannerDiv.className.replace(" w3-show", "");
                                        bannerTextDiv.className = bannerTextDiv.className.replace(" w3-show", "");
                                        bothImg.className = " w3-hide";

                                    }else if(id == "banner"){
                                        bannerDiv.className += " w3-show";
                                        textDiv.className = textDiv.className.replace(" w3-show", "");
                                        bannerTextDiv.className = bannerTextDiv.className.replace(" w3-show", "");
                                        bothImg.className += " w3-show";
                                    }else if(id == "banner_text"){
                                        bannerTextDiv.className += " w3-show";
                                        textDiv.className = textDiv.className.replace(" w3-show", "");
                                        bannerDiv.className =  bannerDiv.className.replace(" w3-show", "");
                                        bothImg.className += " w3-show";
                                    }



                                }

                            </script>

                            <button type="submit" name="submit" class="btn btn-gradient-primary mr-2">Next</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

