<?php
$page = 'content-planner';
?>
<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        
        <meta charset="utf-8" />
<title>Content Planner</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- App favicon -->
<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/Decision-168.png">
<link href="<?php echo base_url();?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<?php
include('header_links.php');
?>

<link href="<?php echo base_url();?>assets/css/new-cards.css" rel="stylesheet" type="text/css" />
    </head>

    <body data-sidebar="dark">
        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php
            include('header.php');
            ?>
<!-- ========== Left Sidebar Start ========== -->
            <?php
            include('sidebar.php');
            ?>
<!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <div class="row align-items-center">
                <div class="col-3">
                    <div>                                                                        
                        <h4 class="mb-sm-0 font-size-18">Planned Content</h4>
                    </div>
                </div>
                <div class="col-9">
                    <div>
                        <ul class="nav nav-pills justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link" id="v-pills-list-tab" data-bs-toggle="pill" href="#v-pills-list" role="tab" aria-controls="v-pills-list" aria-selected="false">
                                    <i class="mdi mdi-format-list-bulleted"></i>
                                </a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link active" id="v-pills-grid-tab" data-bs-toggle="pill" href="#v-pills-grid" role="tab" aria-controls="v-pills-grid" aria-selected="true">
                                    <i class="mdi mdi-view-grid-outline"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-sm btn-d text-white" data-bs-toggle="modal" data-bs-target=".select-project" onclick="$('#select_project_form').trigger('reset');">
                                    <i class="mdi mdi-plus"></i> Plan New Content
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- <div class="page-title-center">
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills justify-content-end">
                            <li class="nav-item me-3">
                                <div class="text-center">
                                   <input class="form-check-input" type="checkbox" id="all_project" onclick="return all_project_filter();" checked>
                                   <label class="form-check-label">All</label>
                                </div>
                            </li>
                            <li class="nav-item me-3">
                                <div class="text-center">
                                   <input class="form-check-input" type="checkbox" id="created_plan_content" onclick="return project_filter();">
                                   <label class="form-check-label">Created Content</label>
                                </div>
                            </li>
                            <li class="nav-item me-3">
                                <div class="text-center">
                                   <input class="form-check-input" type="checkbox" id="assigned_plan_content" onclick="return project_filter();">
                                   <label class="form-check-label">Assigned Content</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
</div>
<!-- end page title-->
<?php
if(($this->session->flashdata('message')) && ($this->session->flashdata('message') != ""))
{
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
<i class="mdi mdi-check-all me-2"></i>
<?php echo $this->session->flashdata('message'); ?>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?> 
<div class="tab-content" id="v-pills-tabContent">

<!-- START CARD VIEW OF CONTENT PLANNER -->
<div class="tab-pane fade show active" id="v-pills-grid" role="tabpanel" aria-labelledby="v-pills-grid-tab">
<div data-simplebar style="max-height: 800px;">
<div id="created_project_grid">
<div class="row">
<?php
if($contentPlanningDetails)
{
    $ccnt=1;
    foreach($contentPlanningDetails as $cpd)
    {
        $getContentPlanningByDel = $this->Front_model->getContentPlanningByDel($cpd->pc_project_assign);
        $proj_del = $this->Front_model->getProjectById($cpd->pc_project_assign);
        $port_del = $this->Front_model->getPortfolio2($cpd->portfolio_id);
?>

<div class="col-md-6 col-xs-12 col-lg-3 search-cards">
    <section ng-repeat="new_card in new_cards" class="new_card theme-red" data-color="#52A43A">
          <section class="new_card__part new_card__part-2">
            <div class="new_card__part__side m--back">
              <div class="new_card__part__inner new_card__face">
                <div class="new_card__face__colored-side"></div>
                <div class="avatar-sm profile-user-wid mb-1 new_card__face__price ng-binding">
                    <?php
                if($port_del)
                {                    
                    if($port_del->photo)
                    {
                    ?>  
                        <a href="<?php echo base_url('portfolio-view/'.$port_del->portfolio_id);?>" title="View Portfolio: <?php if($port_del->portfolio_user == 'company'){ echo $port_del->portfolio_name;}elseif($port_del->portfolio_user == 'individual'){ echo $port_del->portfolio_name.' '.$port_del->portfolio_lname;}else{ echo $port_del->portfolio_name;}?>">
                            <img src="<?php echo base_url('assets/portfolio_photos/'.$port_del->photo);?>" alt="" class="img-thumbnail rounded-circle portfolio_logo">
                        </a>
                    <?php
                    }
                    else
                    {
                    ?>
                    <a href="<?php echo base_url('portfolio-view/'.$port_del->portfolio_id);?>" title="View Portfolio: <?php if($port_del->portfolio_user == 'company'){ echo $port_del->portfolio_name;}elseif($port_del->portfolio_user == 'individual'){ echo $port_del->portfolio_name.' '.$port_del->portfolio_lname;}else{ echo $port_del->portfolio_name;}?>">
                        <span class="avatar-title img-thumbnail rounded-circle portfolio_logo"><?php
                        if($port_del->portfolio_user == 'company')
                            {
                                $fullname = $port_del->portfolio_name;
                                $member_name = explode(" ", $fullname);
                                $profile_name = "";
                                foreach ($member_name as $n)
                                {
                                  $profile_name .= $n[0];
                                }
                                echo strtoupper($profile_name);
                            }
                        elseif($port_del->portfolio_user == 'individual')
                            {
                                $fullname = $port_del->portfolio_name.' '.$port_del->portfolio_lname;
                                $member_name = explode(" ", $fullname);
                                $profile_name = "";
                                foreach ($member_name as $n)
                                {
                                  $profile_name .= $n[0];
                                }
                                echo strtoupper($profile_name);
                            }
                            else
                            {
                                $fullname = $port_del->portfolio_name;
                                $member_name = explode(" ", $fullname);
                                $profile_name = "";
                                foreach ($member_name as $n)
                                {
                                  $profile_name .= $n[0];
                                }
                                echo strtoupper($profile_name);
                            }?></span>
                    </a>
                    <?php
                    } 
                } 
            ?>
                </div>
                <div class="new_card__face__divider"></div>
                <div class="new_card__face__path theme-purple"></div>
                <div class="new_card__face__from-to">
                  <?php
                if(!empty($cpd->pc_project_assign))
                {
                    $check_page = $this->Front_model->ProjectDetail($cpd->pc_project_assign);
                    if($check_page)
                    {
                        $pro = $this->Front_model->getProjectById($cpd->pc_project_assign);
                        ?>
                        <p class="ng-binding">
                            <a href="<?php echo base_url('projects-overview/'.$cpd->pc_project_assign)?>" class="nameLink" data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="hover" data-bs-content="<?php echo $proj_del->pname; ?>">
                                <?php echo $proj_del->pname; ?>
                             </a>
                         </p>
                        <?php
                    }
                    else
                    {
                        $pro = $this->Front_model->getProjectById($cpd->pc_project_assign);
                        ?>
                        <a href="" class="nameLink" title="Open Project"></a>
                        <p class="ng-binding">
                            <a href="<?php echo base_url('projects-overview-accepted/'.$cpd->pc_project_assign)?>" class="nameLink" data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="hover" data-bs-content="<?php echo $proj_del->pname; ?>">
                                <?php echo $proj_del->pname; ?>
                            </a>
                        </p>
                         <?php
                    }
                }
                ?>
                <p class="ng-binding">
                   <?php 
                if($getContentPlanningByDel){
                    $cpcnt=1;
                    foreach ($getContentPlanningByDel as $cp) {
                        ?><a href="#" onclick="show_platform_modal('planner','<?php echo $cp->platform; ?>',<?php echo $cp->pc_id; ?>);"><?php
                        if($cp->platform == 'twitter')
                        {
                            echo '<i class="fab fa-twitter font-size-24 social-d mr-10" title="Twitter"></i>';
                        }else if($cp->platform == 'facebook')
                        {
                            echo '<i class="fab fa-facebook font-size-24 social-d mr-10" title="Facebook"></i>';
                        }else if($cp->platform == 'instagram')
                        {
                            echo '<i class="fab fa-instagram font-size-24 social-d mr-10" title="Instagram"></i>';
                        }else if($cp->platform == 'linkedin')
                        {
                            echo '<i class="fab fa-linkedin font-size-24 social-d mr-10" title="LinkedIn"></i>';
                        }else if($cp->platform == 'google-my-business')
                        {
                            echo '<i class="mdi mdi-google-my-business font-size-24 social-d mr-10" title="Google My Business"></i>';
                        }else if($cp->platform == 'pinterest')
                        {
                            echo '<i class="fab fa-pinterest font-size-24 social-d mr-10" title="Pinterest"></i>';
                        }else if($cp->platform == 'youtube')
                        {
                            echo '<i class="fab fa-youtube font-size-24 social-d mr-10" title="YouTube"></i>';
                        }else if($cp->platform == 'blogger')
                        {
                            echo '<i class="fab fa-blogger font-size-24 social-d mr-10" title="Blog"></i>';
                        }else if($cp->platform == 'tiktok')
                        {
                            echo '<i class="fab fa-tiktok font-size-24 social-d mr-10" title="TikTok"></i>';
                        }else{
                            echo $cp->platform;
                        }
                        ?></a><?php
                        $cpcnt++;
                    }
                }
                ?> 
                </p>
                </div>
                <div class="new_card__face__deliv-date ng-binding">                  
                  <p class="ng-binding">
                    <a onclick="return get_project_id5(<?php echo $cpd->pc_project_assign; ?>);" href="javascript: void(0);" class="float-end h4 eye_preview" style="color:#383838 !important" title="Add More Content"><i class="mdi mdi-plus"></i></a>
                </p>
                </div>
                <div class="new_card__face__stats new_card__face__stats--req">
                  <p class="ng-binding">
                    <?php 
                    if($getContentPlanningByDel){
                        ?>
                        <div class="avatar-group">
                            <?php
                            $assignee_id_array = array();
                            foreach ($getContentPlanningByDel as $cp) {
                                $assignee_id_array[] = $cp->written_content_assignee;
                                $assignee_id_array[] = $cp->pc_file_assignee;
                                $assignee_id_array[] = $cp->submit_to_approval;
                                $assignee_id_array[] = $cp->pc_assignee;
                            }
                            $unique_id_array = array_unique($assignee_id_array);
                            foreach ($unique_id_array as $aia) {
                               $pc_id = $cp->pc_id;
                               $wca = $this->Front_model->getStudentById($aia);
                               if($wca)
                                {            
                                    if($wca->photo)
                                    {
                                    ?>                                 
                                        <div class="avatar-group-item">
                                            <a href="javascript:void(0)" onclick="return TeamProfileModal(<?php echo $wca->reg_id;?>)" class="text-white" title="<?php echo "View: ".$wca->first_name.' '.$wca->last_name;?>">
                                                <img src="<?php echo base_url('assets/student_photos/'.$wca->photo);?>" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    <?php
                                    }
                                    else
                                    {
                                        $fullname = $wca->first_name.' '.$wca->last_name;
                                        $member_name = explode(" ", $fullname);
                                        $profile_name = "";
                                        foreach ($member_name as $n) 
                                        {
                                            $profile_name .= $n[0];
                                        }
                                        ?>
                                        <div class="avatar-group-item">
                                            <a href="javascript:void(0)" onclick="return TeamProfileModal(<?php echo $wca->reg_id;?>)" class="text-white" title="<?php echo "View: ".$wca->first_name.' '.$wca->last_name;?>">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle btn-d text-white font-size-16"><?php echo strtoupper($profile_name);?>
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                } 
                            }
                            ?>
                        </div><?php
                    }
                    ?> 
                  </p>
                </div>
              </div>
            </div>
          </section>
        </section>
        <!-- end ngRepeat: new_card in new_cards -->
    </div>
<?php 
$ccnt++;
}
}
?>
</div>
</div>
</div>
</div>
<!-- END LIST CARD OF CONTENT PLANNER -->

<!-- START LIST VIEW OF CONTENT PLANNER -->
<div class="tab-pane fade" id="v-pills-list" role="tabpanel" aria-labelledby="v-pills-list-tab">
    <div class="row" id="created_project_list">
        <div class="col-lg-12">                                
            <div class="card card-body">
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Portfolio</th>
                                <th scope="col">Project</th>
                                <th scope="col">Platform</th>
                                <th scope="col">Assignee</th>
                            </tr>
                        </thead>
<tbody>
    <?php
        if($contentPlanningDetails)
        {
            $lcnt=1;
            foreach($contentPlanningDetails as $cpd)
            {
                $getContentPlanningByDel = $this->Front_model->getContentPlanningByDel($cpd->pc_project_assign);
                $proj_del = $this->Front_model->getProjectById($cpd->pc_project_assign);
                $port_del = $this->Front_model->getPortfolio2($cpd->portfolio_id);
                ?>
                <tr>
                <td><?php
                if($port_del)
                {                    
                    if($port_del->photo)
                    {
                    ?>  
                        <a href="<?php echo base_url('portfolio-view/'.$port_del->portfolio_id);?>" title="View Portfolio: <?php if($port_del->portfolio_user == 'company'){ echo $port_del->portfolio_name;}elseif($port_del->portfolio_user == 'individual'){ echo $port_del->portfolio_name.' '.$port_del->portfolio_lname;}else{ echo $port_del->portfolio_name;}?>">
                            <img src="<?php echo base_url('assets/portfolio_photos/'.$port_del->photo);?>" alt="" class="img-thumbnail rounded-circle portfolio_logo">
                        </a>
                    <?php
                    }
                    else
                    {
                    ?>
                    <a href="<?php echo base_url('portfolio-view/'.$port_del->portfolio_id);?>" title="View Portfolio: <?php if($port_del->portfolio_user == 'company'){ echo $port_del->portfolio_name;}elseif($port_del->portfolio_user == 'individual'){ echo $port_del->portfolio_name.' '.$port_del->portfolio_lname;}else{ echo $port_del->portfolio_name;}?>">
                        <span class="avatar-title img-thumbnail rounded-circle portfolio_logo"><?php
                        if($port_del->portfolio_user == 'company')
                            {
                                $fullname = $port_del->portfolio_name;
                                $member_name = explode(" ", $fullname);
                                $profile_name = "";
                                foreach ($member_name as $n)
                                {
                                  $profile_name .= $n[0];
                                }
                                echo strtoupper($profile_name);
                            }
                        elseif($port_del->portfolio_user == 'individual')
                            {
                                $fullname = $port_del->portfolio_name.' '.$port_del->portfolio_lname;
                                $member_name = explode(" ", $fullname);
                                $profile_name = "";
                                foreach ($member_name as $n)
                                {
                                  $profile_name .= $n[0];
                                }
                                echo strtoupper($profile_name);
                            }
                            else
                            {
                                $fullname = $port_del->portfolio_name;
                                $member_name = explode(" ", $fullname);
                                $profile_name = "";
                                foreach ($member_name as $n)
                                {
                                  $profile_name .= $n[0];
                                }
                                echo strtoupper($profile_name);
                            }?></span>
                    </a>
                    <?php
                    } 
                } 
                ?></td>
                <td><?php
                if(!empty($cpd->pc_project_assign))
                {
                    $check_page = $this->Front_model->ProjectDetail($cpd->pc_project_assign);
                    if($check_page)
                    {
                        $pro = $this->Front_model->getProjectById($cpd->pc_project_assign);
                        ?><a href="<?php echo base_url('projects-overview/'.$cpd->pc_project_assign)?>" class="nameLink" title="Open Project"><?php echo $proj_del->pname; ?></a><?php
                    }
                    else
                    {
                        $pro = $this->Front_model->getProjectById($cpd->pc_project_assign);
                        ?><a href="<?php echo base_url('projects-overview-accepted/'.$cpd->pc_project_assign)?>" class="nameLink" title="Open Project"><?php echo $proj_del->pname; ?></a><?php
                    }
                }
                ?></td>
                <td>
                <?php 
                if($getContentPlanningByDel){
                    $lpcnt=1;
                    foreach ($getContentPlanningByDel as $cp) {
                        ?><a href="#" onclick="show_platform_modal('planner','<?php echo $cp->platform; ?>',<?php echo $cp->pc_id; ?>);"><?php
                        if($cp->platform == 'twitter')
                        {
                            echo '<i class="fab fa-twitter font-size-24 social-d mr-10" title="Twitter"></i>';
                        }else if($cp->platform == 'facebook')
                        {
                            echo '<i class="fab fa-facebook font-size-24 social-d mr-10" title="Facebook"></i>';
                        }else if($cp->platform == 'instagram')
                        {
                            echo '<i class="fab fa-instagram font-size-24 social-d mr-10" title="Instagram"></i>';
                        }else if($cp->platform == 'linkedin')
                        {
                            echo '<i class="fab fa-linkedin font-size-24 social-d mr-10" title="LinkedIn"></i>';
                        }else if($cp->platform == 'google-my-business')
                        {
                            echo '<i class="mdi mdi-google-my-business font-size-24 social-d mr-10" title="Google My Business"></i>';
                        }else if($cp->platform == 'pinterest')
                        {
                            echo '<i class="fab fa-pinterest font-size-24 social-d mr-10" title="Pinterest"></i>';
                        }else if($cp->platform == 'youtube')
                        {
                            echo '<i class="fab fa-youtube font-size-24 social-d mr-10" title="YouTube"></i>';
                        }else if($cp->platform == 'blogger')
                        {
                            echo '<i class="fab fa-blogger font-size-24 social-d mr-10" title="Blog"></i>';
                        }else if($cp->platform == 'tiktok')
                        {
                            echo '<i class="fab fa-tiktok font-size-24 social-d mr-10" title="TikTok"></i>';
                        }else{
                            echo $cp->platform;
                        }
                        ?></a><?php
                        $lpcnt++;
                    }
                }
                ?>                        
                </td>
                <td><?php 
                if($getContentPlanningByDel){
                    ?>
                    <div class="avatar-group">
                    <?php
                        $assignee_id_array = array();
                        foreach ($getContentPlanningByDel as $cp) {
                            $assignee_id_array[] = $cp->written_content_assignee;
                            $assignee_id_array[] = $cp->pc_file_assignee;
                            $assignee_id_array[] = $cp->submit_to_approval;
                            $assignee_id_array[] = $cp->pc_assignee;
                        }
                        $unique_id_array = array_unique($assignee_id_array);
                        foreach ($unique_id_array as $aia) {
                           $pc_id = $cp->pc_id;
                           $wca = $this->Front_model->getStudentById($aia);
                           if($wca)
                            {            
                                if($wca->photo)
                                {
                                ?>                                 
                                    <div class="avatar-group-item">
                                        <a href="javascript:void(0)" onclick="return TeamProfileModal(<?php echo $wca->reg_id;?>)" class="text-white" title="<?php echo "View: ".$wca->first_name.' '.$wca->last_name;?>">
                                            <img src="<?php echo base_url('assets/student_photos/'.$wca->photo);?>" alt="" class="rounded-circle avatar-xs">
                                        </a>
                                    </div>
                                <?php
                                }
                                else
                                {
                                    $fullname = $wca->first_name.' '.$wca->last_name;
                                    $member_name = explode(" ", $fullname);
                                    $profile_name = "";
                                    foreach ($member_name as $n) 
                                    {
                                        $profile_name .= $n[0];
                                    }
                                    ?>
                                    <div class="avatar-group-item">
                                        <a href="javascript:void(0)" onclick="return TeamProfileModal(<?php echo $wca->reg_id;?>)" class="text-white" title="<?php echo "View: ".$wca->first_name.' '.$wca->last_name;?>">
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle btn-d text-white font-size-16"><?php echo strtoupper($profile_name);?>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                            } 
                        }
                        ?>
                    </div><?php
                }
                ?></td>
                </tr>
                <?php
                $lcnt++;
            }
        }
    ?>  
</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- END LIST VIEW OF CONTENT PLANNER -->

<!-- MODAL START PREVIEW PLATFORM -->
<div class="modal fade preview-platform" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row platform-card twitter-card" style="display: none;">
                    <div class="col-md-12">
                        <div class="twitter-content"></div>
                        <div class="row">
                            <div class="col-md-12 p-0">
                                <div id="carouselTwitterIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <ol class="carousel-indicators twitter-images-ol">
                                    </ol>
                                    <div class="carousel-inner twitter-images" role="listbox">
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselTwitterIndicators" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselTwitterIndicators" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="twitter-icon-card">
                            <div class="twitter-icon text-center">
                                <i aria-hidden="true" class="mdi mdi-comment-outline"></i> &nbsp; 0
                            </div>
                            <div class="twitter-icon text-center">
                                <i aria-hidden="true" class="mdi mdi-twitter-retweet"></i> &nbsp; 0
                            </div>
                            <div class="twitter-icon text-center">
                                <i aria-hidden="true" class="mdi mdi-heart-outline"></i> &nbsp; 0
                            </div>
                            <div class="twitter-icon text-center">
                                <i aria-hidden="true" class="mdi mdi-export-variant"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row platform-card facebook-card" style="display: none;">
                    <div class="col-md-12">
                        <div class="facebook-content"></div>
                        <div class="row">
                            <div class="col-md-12 p-0">
                                <div id="carouselFBIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <ol class="carousel-indicators facebook-images-ol">
                                    </ol>
                                    <div class="carousel-inner facebook-images" role="listbox">
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselFBIndicators" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselFBIndicators" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="facebook-icon-card">
                            <div class="facebook-icon text-center">
                                <i aria-hidden="true" class="mdi mdi-thumb-up-outline"></i> Like
                            </div>
                            <div class="facebook-icon text-center">
                                <i aria-hidden="true" class="mdi mdi-chat-processing-outline"></i> Comment
                            </div>
                            <div class="facebook-icon text-center">
                                <i aria-hidden="true" class="mdi mdi-share"></i> Share
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row platform-card instagram-card" style="display: none;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 p-0">
                                <div id="carouselInstaIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <ol class="carousel-indicators instagram-images-ol">
                                    </ol>
                                    <div class="carousel-inner instagram-images" role="listbox">
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselInstaIndicators" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselInstaIndicators" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="instagram-icon-card">
                            <div class="instagram-icon text-center">
                                <i aria-hidden="true" class="mdi mdi-heart-outline"></i>
                            </div>
                            <div class="instagram-icon text-center">
                                <i aria-hidden="true" class="mdi mdi-chat-outline"></i>
                            </div>
                            <div class="instagram-icon text-center">
                                <i aria-hidden="true" class="mdi mdi-send"></i>
                            </div>
                        </div>
                            <div class="instagram-icon text-center float-end">
                                <i aria-hidden="true" class="mdi mdi-bookmark-outline"></i>
                            </div>
                        <div class="instagram-content"></div>
                    </div>
                </div>
                <div class="row platform-card linkedin-card" style="display: none;">
                    <div class="col-md-12">
                        <div class="linkedin-content"></div>
                        <div class="row">
                            <div class="col-md-12 p-0">
                                <div id="carouselLIIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <ol class="carousel-indicators linkedin-images-ol">
                                    </ol>
                                    <div class="carousel-inner linkedin-images" role="listbox">
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselLIIndicators" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselLIIndicators" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="linkedin-icon-card">
                            <div class="linkedin-icon text-center">
                                <i aria-hidden="true" class="mdi mdi-thumb-up-outline"></i> Like
                            </div>
                            <div class="linkedin-icon text-center">
                                <i aria-hidden="true" class="mdi mdi-chat-processing-outline"></i> Comment
                            </div>
                            <div class="linkedin-icon text-center">
                                <i aria-hidden="true" class="mdi mdi-share"></i> Share
                            </div>
                            <div class="linkedin-icon text-center">
                                <i aria-hidden="true" class="mdi mdi-send"></i> Send
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row platform-card google-my-business-card" style="display: none;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 p-0">
                                <div id="carouselGMBIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <ol class="carousel-indicators google-my-business-images-ol">
                                    </ol>
                                    <div class="carousel-inner google-my-business-images" role="listbox">
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselGMBIndicators" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselGMBIndicators" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="google-my-business-content"></div>
                        <div class="google-my-business-icon-card">
                            <div class="google-my-business-icon text-center">
                                CTA
                            </div>
                        </div>
                        <div class="text-center float-end" style="font-size: 18px;">
                            <i aria-hidden="true" class="mdi mdi-share-variant"></i>
                        </div>
                    </div>
                </div>
                <div class="row platform-card pinterest-card" style="display: none;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 p-0">
                                <div id="carouselPinterestIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <ol class="carousel-indicators pinterest-images-ol">
                                    </ol>
                                    <div class="carousel-inner pinterest-images" role="listbox">
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselPinterestIndicators" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselPinterestIndicators" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="pinterest-title"></div>
                        <div class="pinterest-content-1"></div>
                        <div class="pinterest-content-2"></div>
                    </div>
                </div>
                <div class="row platform-card youtube-card" style="display: none;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 p-0">
                                <div id="carouselYTIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <ol class="carousel-indicators youtube-images-ol">
                                    </ol>
                                    <div class="carousel-inner youtube-images" role="listbox">
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselYTIndicators" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselYTIndicators" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="youtube-pc_title"></div>
                        <div class="youtube-content"></div>
                    </div>
                </div>
                <div class="row platform-card blogger-card" style="display: none;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 p-0">
                                <div id="carouselBlogIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <ol class="carousel-indicators blogger-images-ol">
                                    </ol>
                                    <div class="carousel-inner blogger-images" role="listbox">
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselBlogIndicators" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselBlogIndicators" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="blogger-title"></div>
                        <div class="blogger-content"></div>
                    </div>
                </div>
                <div class="row platform-card tiktok-card" style="display: none;">
                    <div class="col-md-12">                        
                        <div class="row">
                            <div class="col-md-12 p-0">
                                <div id="carouselTiktokIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <ol class="carousel-indicators tiktok-images-ol">
                                    </ol>
                                    <div class="carousel-inner tiktok-images" role="listbox">
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselTiktokIndicators" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselTiktokIndicators" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="tiktok-content"></div>
                    </div>
                </div>
            </div>            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- MODAL END PREVIEW PLATFORM -->

<!-- MODAL START SELECT PORTFOLIO AND PROJECT -->
<div class="modal fade select-project" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Plan New Content</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" name="select_project_form" id="select_project_form">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if($plist || $accepted_plist)
                            {
                                ?>
                                <div class="form-group mb-2">
                                    <label for="portfolio_name" class="col-form-label">Portfolio <span class="text-danger">*</span></label>
                                    <select class="form-select select2" onchange="get_portfolio_projects(this.value);" name="portfolio_id" id="portfolio_id">
                                        <option value="" selected="">Select Portfolio</option>
                                    <?php
                                    $portfolio = $this->Front_model->Portfolio();
                                    $acceptedProjectList = $this->Front_model->AcceptedProjectListPortfolio();       
                                    if($portfolio || $acceptedProjectList)
                                    {
                                        if($portfolio){
                                            foreach($portfolio as $c)
                                            {
                                                ?>
                                                <option value="<?php echo $c->portfolio_id;?>">
                                                    <span><?php 
                                                    if($c->portfolio_user == 'company')
                                                    { 
                                                        echo $c->portfolio_name;
                                                    }
                                                    elseif($c->portfolio_user == 'individual')
                                                    { 
                                                        echo $c->portfolio_name.' '.$c->portfolio_lname;
                                                    }
                                                    else{ 
                                                        echo $c->portfolio_name.' '.$c->portfolio_lname;
                                                    }
                                                ?></span></option>
                                                <?php        
                                            }
                                        }
                                        if($acceptedProjectList){
                                            foreach($acceptedProjectList as $al)
                                            {
                                                $c_id = $al->portfolio_id;
                                                if($c_id != 0)
                                                {
                                                    $getAllPortfolio = $this->Front_model->getAllPortfolio($c_id);
                                                    if($getAllPortfolio){
                                                        if($getAllPortfolio->portfolio_createdby != $this->session->userdata('d168_id'))
                                                        {
                                                            ?>
                                                            <option value="<?php echo $getAllPortfolio->portfolio_id;?>">
                                                                <span><?php 
                                                                if($getAllPortfolio->portfolio_user == 'company')
                                                                { 
                                                                    echo $getAllPortfolio->portfolio_name;
                                                                }elseif($getAllPortfolio->portfolio_user == 'individual')
                                                                { 
                                                                    echo $getAllPortfolio->portfolio_name.' '.$getAllPortfolio->portfolio_lname;
                                                                }
                                                                else
                                                                { 
                                                                    echo $getAllPortfolio->portfolio_name;
                                                                }
                                                            ?></span>
                                                            </option>
                                                            <?php
                                                        }
                                                    }                                                    
                                                }
                                            }
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <option value=""><span>No Portfolio. Create New</span></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                </div>                                
                                <div class="form-group mb-2">
                                    <label for="pc_project_assign" class="col-form-label">Project <span class="text-danger">*</span></label>
                                    
                                        <select class="form-select" name="pc_project_assign" id="pc_project_assign" onchange="return get_project_id6();" required="">
                                            <option value="" selected="">Select Project</option>
                                        </select>
                                        <span id="pc_project_assignErr" class="text-danger"></span>
                                    
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                            if($plist || $accepted_plist)
                            {
                        ?>
                        <div class="justify-content-end">
                            <button type="submit" id="select_project_button" class="btn btn-d btn-sm">Add New Content</button>
                            <img id="loader2" style="visibility: hidden;" src="<?php echo base_url()?>assets/images/loading.gif">
                            <a class="btn btn-sm bg-d text-white" data-bs-dismiss="modal" href="#">
                                Cancel 
                            </a>
                        </div>
                        <div class="col-md-12" style="margin-top: 20px;">
                            <div class="font-weight-bold"><h5> -- OR -- </h5></div>
                        </div>
                        <?php
                            }
                        ?>
                        <div class="col-md-12">
                            <a class="btn btn-sm btn-d text-white" href="<?php echo base_url('projects-create');?>">
                                <i class="mdi mdi-plus"></i> Create Project and Add New Content
                            </a>
                        </div>
                    </div>
                </form>
            </div>            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- MODAL END SELECT PORTFOLIO AND PROJECT -->

<!--  MODAL START ADD NEW CONTENT -->
<div class="modal fade add-new-content" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Add New Content</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" name="create_content_form" id="create_content_form" enctype="multipart/form-data" autocomplete="off">
                    <div data-repeater-list="outer-group" class="outer">
                        <div data-repeater-item class="outer plan-content-wrapper accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item" id="plan-content-1">
                                <h2 class="accordion-header" id="flush-heading-1">
                                    <button class="accordion-button fw-medium font-weight-semibold platform-button-1" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-1" aria-expanded="true" aria-controls="flush-collapse-1">
                                        Platform 1
                                    </button>
                                    <input type="hidden" name="pc_id1" id="pc_id" value="">
                                </h2>
                                <div id="flush-collapse-1" class="row accordion-collapse collapse show accordion-body" aria-labelledby="flush-heading-1" data-bs-parent="#accordionFlushExample">
                                    <div class="col-md-6">                          
                                        <div class="form-group mb-2 platform">
                                            <label for="platform" class="col-form-label">Select Platform <span class="text-danger">*</span></label>
                                            <div class="platform-section">
                                                <label class="mr-10"><input onclick="platformChanges(this.value,1);" type="radio" value="twitter" class="InputPlatformCP1" id="platform" name="platform1">
                                                <i class="fab fa-twitter font-size-24" class="InputPlatformCP1" title="Twitter"></i></label>

                                                <label class="mr-10"><input onclick="platformChanges(this.value,1);" type="radio" value="facebook" class="InputPlatformCP1" id="platform" name="platform1">
                                                <i class="fab fa-facebook font-size-24" title="Facebook"></i></label>

                                                <label class="mr-10"><input onclick="platformChanges(this.value,1);" type="radio" value="instagram" class="InputPlatformCP1" id="platform" name="platform1">
                                                <i class="fab fa-instagram font-size-24" title="Instagram"></i></label>

                                                <label class="mr-10"><input onclick="platformChanges(this.value,1);" type="radio" value="linkedin" class="InputPlatformCP1" id="platform" name="platform1">
                                                <i class="fab fa-linkedin font-size-24" title="LinkedIn"></i></label>

                                                <label class="mr-10"><input onclick="platformChanges(this.value,1);" type="radio" value="google-my-business" class="InputPlatformCP1" id="platform" name="platform1">
                                                <i class="mdi mdi-google-my-business font-size-24" title="Google My Business"></i></label>

                                                <label class="mr-10"><input onclick="platformChanges(this.value,1);" type="radio" value="pinterest" class="InputPlatformCP1" id="platform" name="platform1">
                                                <i class="fab fa-pinterest font-size-24" title="Pinterest"></i></label>

                                                <label class="mr-10"><input onclick="platformChanges(this.value,1);" type="radio" value="youtube" class="InputPlatformCP1" id="platform" name="platform1">
                                                <i class="fab fa-youtube font-size-24" title="YouTube"></i></label>

                                                <label class="mr-10"><input onclick="platformChanges(this.value,1);" type="radio" value="blogger" class="InputPlatformCP1" id="platform" name="platform1">
                                                <i class="fab fa-blogger font-size-24" title="Blog"></i></label>

                                                <label class="mr-10"><input onclick="platformChanges(this.value,1);" type="radio" value="tiktok" class="InputPlatformCP1" id="platform" name="platform1">
                                                <i class="fab fa-tiktok font-size-24" title="TikTok"></i> </label>
                                            </div>
                                            <span id="platformErr" class="text-danger"></span>
                                        </div>  
                                        <div class="form-group mb-2 youtube-title" style="display:none;">
                                            <label for="pc_title" class="col-form-label pc_title_label">Title </label>
                                            <input onkeyup="return onTitleChange(this.value,1);" id="pc_title" name="pc_title1" type="text" class="form-control youtube-field" placeholder="Enter Title"  maxlength="100">
                                            <span style="display: none;" class="text-danger title-span"></span>
                                            <span id="pc_titleErr" class="text-danger"></span>
                                        </div>  

                                        <div class="form-group mb-2 written_content">
                                            <label for="written_content" class="col-form-label written_content_label">Written Content </label>
                                            <textarea maxlength="5000" onkeyup="return onWrittenContentChange(this.value,1);" class="form-control" id="written_content" name="written_content1" rows="5" placeholder="Enter Written Content"></textarea>
                                            <span style="display:none;" class="text-danger written-content-span"></span>
                                            <span id="written_contentErr" class="text-danger"></span>
                                        </div>  

                                        <div class="form-group mb-2 written-content-2" style="display:none;">
                                            <label for="written_content" class="col-form-label written_content_2_label">Written Content 2</label>
                                            <textarea maxlength="500" onkeyup="return onWrittenContent2Change(this.value,1);" class="form-control" id="written_content_2" name="written_content_21" rows="5" placeholder="Enter Written Content 2"></textarea>
                                            <span style="display:none;" class="text-danger written-content-2-span"></span>
                                            <span id="written_content_2Err" class="text-danger"></span>
                                        </div>

                                        <div class="form-group mb-2 blog-field-div" style="display:none;">
                                            <label for="target_audience" class="col-form-label target_audience_label">Target Audience</label>
                                            <input id="target_audience" name="target_audience1" type="text" class="form-control blog-field" placeholder="Enter Target Audience">
                                            <span style="display: none;" class="text-danger target_audience-span"></span>
                                            <span id="target_audienceErr" class="text-danger"></span>
                                        </div>

                                        <div class="form-group mb-2 blog-field-div" style="display:none;">
                                            <label for="solutions" class="col-form-label solutions_label">Solutions</label>
                                            <input id="solutions" name="solutions1" type="text" class="form-control blog-field" placeholder="Enter Solutions">
                                            <span style="display: none;" class="text-danger solutions-span"></span>
                                            <span id="solutionsErr" class="text-danger"></span>
                                        </div>

                                        <div class="form-group mb-2 blog-field-div" style="display:none;">
                                            <label for="keywords" class="col-form-label keywords_label">Keywords</label>
                                            <input id="keywords" name="keywords1" type="text" class="form-control blog-field" placeholder="Enter Keywords">
                                            <span style="display: none;" class="text-danger keywords-span"></span>
                                            <span id="keywordsErr" class="text-danger"></span>
                                        </div>

                                        <div class="form-group mb-2 blog-field-div" style="display:none;">
                                            <label for="internal_links" class="col-form-label internal_links_label">Internal Links</label>
                                            <input id="internal_links" name="internal_links1" type="text" class="form-control blog-field" placeholder="Enter Internal Links">
                                            <span style="display: none;" class="text-danger internal_links-span"></span>
                                            <span id="internal_linksErr" class="text-danger"></span>
                                        </div>

                                        <div class="form-group mb-2 blog-field-div" style="display:none;">
                                            <label for="external_links" class="col-form-label external_links_label">External Links</label>
                                            <input id="external_links" name="external_links1" type="text" class="form-control blog-field" placeholder="Enter External Links">
                                            <span style="display: none;" class="text-danger external_links-span"></span>
                                            <span id="external_linksErr" class="text-danger"></span>
                                        </div>

                                        <div class="form-group mb-2 blog-field-div" style="display:none;">
                                            <label for="meta_title" class="col-form-label meta_title_label">Meta title</label>
                                            <input id="meta_title" name="meta_title1" type="text" class="form-control blog-field" placeholder="Enter Meta title">
                                            <span style="display: none;" class="text-danger meta_title-span"></span>
                                            <span id="meta_titleErr" class="text-danger"></span>
                                        </div>  

                                        <div class="form-group mb-2 blog-field-div" style="display:none;">
                                            <label for="meta_description" class="col-form-label meta_description_label">Meta Description</label>
                                            <textarea maxlength="5000" id="meta_description" name="meta_description1" class="form-control blog-field" rows="5" placeholder="Enter Meta Description"></textarea>
                                            <span style="display: none;" class="text-danger meta_description-span"></span>
                                            <span id="meta_descriptionErr" class="text-danger"></span>
                                        </div>   

                                        <div class="form-group mb-2 tags" style="display:none;">
                                            <label for="tags" class="col-form-label tags_label">Tags</label>
                                            <textarea maxlength="400" class="form-control" id="tags" name="tags1" rows="5" placeholder="Add Tag"></textarea>
                                            <span style="display:none;" class="text-danger tags-span"></span>
                                            <span id="tagsErr" class="text-danger"></span>
                                        </div>  

                                        <div class="form-group mb-2 pc_file">
                                            <label class="col-form-label pc_file_label">Attach Media </label>
                                            <input type="hidden" name="total_content[]" id="total_content" value="1">
                                            <input class="form-control limitInputCPFiles" name="pc_file1[]" id="pc_file" type="file" accept="video/*,image/*" multiple="" data-id="1" />
                                            <span id="limitInputCPFilesErr1" class="text-danger"></span>
                                            <span id="pc_file1Err" class="text-danger"></span>
                                        </div>
                                        <div class="form-group mb-2 blog-field-div" style="display: none;">
                                            <label class="col-form-label pc_file_label">Attach Documents </label>
                                            <input class="form-control blog-field" name="doc_pc_file1[]" id="doc_pc_file" type="file" multiple="" data-id="1" />
                                            <span id="doc_pc_file1Err" class="text-danger"></span>
                                        </div>                                              
                                    </div>                                                  
                                    <div class="col-md-6" style="margin-top: 90px;">
                                        <div class="form-group mb-2">
                                            <label for="written_content_assignee" class="col-form-label written_content_assignee_label">Assignee for Written Content </label>
                                            <select name="written_content_assignee1" id="written_content_assignee1" class="form-control select2 written_content_assignee"  style="line-height: 1.5;">
                                                <option value="<?php echo $this->session->userdata('d168_id');?>">Assign To Me</option>
                                            </select> 
                                            <span id="written_content_assigneeErr" class="text-danger"></span>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="pc_file_assignee" class="col-form-label pc_file_assignee_label">Assignee for Media files </label>        
                                            <select name="pc_file_assignee1" id="pc_file_assignee1" class="form-control select2 pc_file_assignee"  style="line-height: 1.5;">
                                                <option value="<?php echo $this->session->userdata('d168_id');?>">Assign To Me</option>
                                            </select> 
                                            <span id="pc_file_assigneeErr" class="text-danger"></span>   
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="submit_to_approval" class="col-form-label submit_to_approval_label">Submit for Approval </label>    
                                            <select name="submit_to_approval1" id="submit_to_approval1" class="form-control select2 submit_to_approval"  style="line-height: 1.5;">
                                                <option value="<?php echo $this->session->userdata('d168_id');?>">Assign To Me</option>
                                            </select> 
                                            <span id="submit_to_approvalErr" class="text-danger"></span>
                                        </div>
                                        
                                        <div class="form-group mb-2">
                                            <label for="pc_assignee" class="col-form-label pc_assignee_label">Schedular </label>
                                            <select name="pc_assignee1" id="pc_assignee1" class="form-control select2 pc_assignee"  style="line-height: 1.5;">
                                                <option value="<?php echo $this->session->userdata('d168_id');?>">Assign To Me</option>
                                                <option value=""><span>None</span></option>
                                            </select> 
                                            <span id="pc_assigneeErr" class="text-danger"></span> 
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label class="col-form-label col-lg-12 pc_link_label">Link(s) & Comment(s)</label>
                                        <div class="col-lg-5">
                                            <input id="pc_link" name="pc_link1[]" type="text" class="form-control" placeholder="Enter Link">
                                            <span id="pc_linkErr" class="text-danger"></span>
                                        </div>
                                        <div class="col-lg-5">
                                            <input id="pc_link_comment" name="pc_link_comment1[]" type="text" class="form-control" placeholder="Enter Link Comment">
                                            <span id="pc_link_commentErr" class="text-danger"></span>
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="button" class="add_dup_pc_link1 btn btn-d btn-sm">Add Another link</button>                                                   
                                        </div>
                                    </div>
                                    <div class="pc_link_div1"></div>
                                    <span id="link_validErr1" class="text-danger"></span>                    
                                </div> 
                            </div>                                                         
                        </div><br>
                        <button type="button" id="add_more_plan_content" class="btn btn-d btn-sm">Add More Content</button>
                        <div class="row float-end mb-5"><div class="justify-content-end float-end">
                            <?php
                            if(!empty($this->input->post('pid')))
                            {
                                ?>
                            <input type="hidden" name="pid" id="pid" value="<?php echo $this->input->post('pid');?>">
                                <?php
                            }
                            else
                            {
                                ?>
                            <input type="hidden" name="pid" id="pid">
                                <?php
                            }
                            ?>
                            <button type="submit" id="create_content_button" class="btn btn-d btn-sm">Create Content</button>
                            <img id="loader2" style="visibility: hidden;" src="<?php echo base_url()?>assets/images/loading.gif">
                            <a class="btn btn-sm bg-d text-white" data-bs-dismiss="modal" href="#">
                                Cancel 
                            </a>
                        </div></div>                     
                        
                    </div>                                    
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--  MODAL END ADD NEW CONTENT -->
</div>
</div> <!-- container-fluid -->
</div>
<!-- End Page-content -->


<?php
include('footer.php');
?>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->    
<!-- CP Edit Modal -->
<div class="modal fade" id="EditCPModalLabel" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl modal-dialog-scrollable">
       <div class="modal-content" id="EditCPModalLabel_content">
           
       </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  
<!-- Preview content planner file modal content -->
<div id="previewContentModal" class="modal fade bs-example-modal-lg" tabindex="-1" aria-labelledby="#previewContentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="previewContentModal_Content">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 
<!-- Preview content planner document modal content -->
<div id="previewContentDocModal" class="modal fade bs-example-modal-lg" tabindex="-1" aria-labelledby="#previewContentDocModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="previewContentDocModal_Content">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->                                    
        <!-- JAVASCRIPT -->
        <!-- JAVASCRIPT -->
<script src="<?php echo base_url();?>assets/libs/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?php echo base_url();?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?php echo base_url();?>assets/libs/select2/js/select2.min.js"></script>
<!-- apexcharts -->
<script src="<?php echo base_url();?>assets/libs/apexcharts/apexcharts.min.js"></script>

<script src="<?php echo base_url();?>assets/js/pages/project-overview.init.js"></script>
<script src="<?php echo base_url();?>assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<!-- form advanced init -->
<script src="<?php echo base_url();?>assets/js/pages/form-advanced.init.js"></script>
       <?php
include('footer_links.php');
?>
<script type="text/javascript">
$('.limitInputCPFiles').change(function() {
  
    var id = $(this).attr('data-id');
    var platform = $('.InputPlatformCP'+id+':checked').val();
    if(platform == 'twitter')
    {
      if (this.files.length > 4)
      {
        $('#limitInputCPFilesErr'+id).html('Too Many Files Attached');
        $(this).val('');
      }else{
        $('#limitInputCPFilesErr'+id).html('');
      }
    } 
    if(platform == 'facebook')
    {
      if (this.files.length > 6)
      {
        $('#limitInputCPFilesErr'+id).html('Too Many Files Attached');
        $(this).val('');
      }else{
        $('#limitInputCPFilesErr'+id).html('');
      }
    }
    if(platform == 'instagram')
    {
      if (this.files.length > 10)
      {
        $('#limitInputCPFilesErr'+id).html('Too Many Files Attached');
        $(this).val('');
      }else{
        $('#limitInputCPFilesErr'+id).html('');
      }
    }
    if(platform == 'linkedin')
    {
      if (this.files.length > 1)
      {
        $('#limitInputCPFilesErr'+id).html('Too Many Files Attached');
        $(this).val('');
      }else{
        $('#limitInputCPFilesErr'+id).html('');
      }
    }
    if(platform == 'google-my-business')
    {
      if (this.files.length > 10)
      {
        $('#limitInputCPFilesErr'+id).html('Too Many Files Attached');
        $(this).val('');
      }else{
        $('#limitInputCPFilesErr'+id).html('');
      }
    }
    if(platform == 'pinterest')
    {
      if (this.files.length > 5)
      {
        $('#limitInputCPFilesErr'+id).html('Too Many Files Attached');
        $(this).val('');
      }else{
        $('#limitInputCPFilesErr'+id).html('');
      }
    }
    if(platform == 'youtube')
    {
      if (this.files.length > 1)
      {
        $('#limitInputCPFilesErr'+id).html('Too Many Files Attached');
        $(this).val('');
      }else{
        $('#limitInputCPFilesErr'+id).html('');
      }
    }
    if(platform == 'blogger')
    {
      if (this.files.length > 4)
      {
        $('#limitInputCPFilesErr'+id).html('Too Many Files Attached');
        $(this).val('');
      }else{
        $('#limitInputCPFilesErr'+id).html('');
      }
    }
    if(platform == 'tiktok')
    {
      if (this.files.length > 1)
      {
        $('#limitInputCPFilesErr'+id).html('Too Many Files Attached');
        $(this).val('');
      }else{
        $('#limitInputCPFilesErr'+id).html('');
      }
    }   
  });
$(document).ready(function(){
    var add_dup_pc_link1 = $('.add_dup_pc_link1'); //Add button selector
    var pc_link_div1 = $('.pc_link_div1'); //Input field wrapper
    var pc_linkHTML1 = '<div class="row mb-2"><label class="col-form-label col-lg-12"></label><div class="col-lg-5"><input id="pc_link" name="pc_link1[]" type="text" class="form-control" placeholder="Enter Link"><span id="pc_linkErr" class="text-danger"></span></div><div class="col-lg-5"><input id="pc_link_comment" name="pc_link_comment1[]" type="text" class="form-control" placeholder="Enter Link Comment"><span id="pc_link_commentErr" class="text-danger"></span></div><div class="col-lg-2 card-title mb-2"><button type="button" class="btn btn-light position-relative p-0 avatar-xs rounded-circle add_dup_pc_link_sec1" style="margin-left: 30px;"><span class="avatar-title bg-transparent text-reset"><i class="bx bx-plus"></i></span></button><button type="button" class="btn btn-light position-relative p-0 avatar-xs rounded-circle remove_dup_pc_link1" style="margin-left: 15px;"><span class="avatar-title bg-transparent text-reset"><i class="bx bx-minus"></i></span></button></div></div>'; //New input field html
    var a = 1; //Initial field counter is 1
   
    //Once add button is clicked
    $(add_dup_pc_link1).click(function(){
        $(pc_link_div1).append(pc_linkHTML1); //Add field html
    });
   
    $(pc_link_div1).on('click', '.add_dup_pc_link_sec1', function(e){
        $(pc_link_div1).append(pc_linkHTML1); 
    });

    //Once remove button is clicked
    $(pc_link_div1).on('click', '.remove_dup_pc_link1', function(e){
       e.preventDefault();
       $(this).parent('div').parent('div').remove(); //Remove field html
       a--; //Decrement field counter
    });

    $('#add_more_plan_content').on('click',function(event){
        window.scrollTo(0, 0);
        var plan_content_wrapper = $('.plan-content-wrapper');
        var plan_content_id = plan_content_wrapper.children().last().attr('id');
        var plan_content_array = plan_content_id.split("-");
        var current_plan_id = plan_content_array[2];
        $('#flush-heading-'+current_plan_id).find('.platform-button-'+current_plan_id).addClass('collapsed');
        $('#flush-heading-'+current_plan_id).find('.platform-button-'+current_plan_id).attr('aria-expanded',false);
        $('#flush-collapse-'+current_plan_id).removeClass('show');
        var plan_id = parseInt(current_plan_id)+1;
        var plan_wrapperHTML = '<div class="accordion-item" id="plan-content-'+plan_id+'"><h2 class="accordion-header" id="flush-heading-'+plan_id+'"><button class="accordion-button fw-medium font-weight-semibold platform-button-'+plan_id+'" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-'+plan_id+'" aria-expanded="true" aria-controls="flush-collapse-'+plan_id+'">Platform '+plan_id+'</button><input type="hidden" name="pc_id'+plan_id+'" id="pc_id" value=""></h2><div id="flush-collapse-'+plan_id+'" class="row accordion-collapse collapse show accordion-body" aria-labelledby="flush-heading-'+plan_id+'" data-bs-parent="#accordionFlushExample"><div class="col-md-6"><div class="form-group mb-2 platform"><label for="platform" class="col-form-label">Select Platform <span class="text-danger">*</span></label><div class="platform-section"><label class="mr-10"><input onclick="platformChanges(this.value,'+plan_id+');" type="radio" value="twitter" class="InputPlatformCP'+plan_id+'" id="platform" name="platform'+plan_id+'"><i class="fab fa-twitter font-size-24" title="Twitter"></i></label><label class="mr-10"><input onclick="platformChanges(this.value,'+plan_id+');" type="radio" value="facebook" class="InputPlatformCP'+plan_id+'" id="platform" name="platform'+plan_id+'"><i class="fab fa-facebook font-size-24" title="Facebook"></i></label><label class="mr-10"><input onclick="platformChanges(this.value,'+plan_id+');" type="radio" value="instagram" class="InputPlatformCP'+plan_id+'" id="platform" name="platform'+plan_id+'"><i class="fab fa-instagram font-size-24" title="Instagram"></i></label><label class="mr-10"><input onclick="platformChanges(this.value,'+plan_id+');" type="radio" value="linkedin" class="InputPlatformCP'+plan_id+'" id="platform" name="platform'+plan_id+'"><i class="fab fa-linkedin font-size-24" title="LinkedIn"></i></label><label class="mr-10"><input onclick="platformChanges(this.value,'+plan_id+');" type="radio" value="google-my-business" class="InputPlatformCP'+plan_id+'" id="platform" name="platform'+plan_id+'"><i class="mdi mdi-google-my-business font-size-24" title="Google My Business"></i></label><label class="mr-10"><input onclick="platformChanges(this.value,'+plan_id+');" type="radio" value="pinterest" class="InputPlatformCP'+plan_id+'" id="platform" name="platform'+plan_id+'"><i class="fab fa-pinterest font-size-24" title="Pinterest"></i></label><label class="mr-10"><input onclick="platformChanges(this.value,'+plan_id+');" type="radio" value="youtube" class="InputPlatformCP'+plan_id+'" id="platform" name="platform'+plan_id+'"><i class="fab fa-youtube font-size-24" title="YouTube"></i></label><label class="mr-10"><input onclick="platformChanges(this.value,'+plan_id+');" type="radio" value="blogger" class="InputPlatformCP'+plan_id+'" id="platform" name="platform'+plan_id+'"><i class="fab fa-blogger font-size-24" title="Blog"></i></label><label class="mr-10"><input onclick="platformChanges(this.value,'+plan_id+');" type="radio" value="tiktok" class="InputPlatformCP'+plan_id+'" id="platform" name="platform'+plan_id+'"><i class="fab fa-tiktok font-size-24" title="TikTok"></i> </label></div><span id="platformErr" class="text-danger"></span></div><div class="form-group mb-2 youtube-title" style="display:none;"><label for="pc_title" class="col-form-label pc_title_label">Title </label><input onkeyup="return onTitleChange(this.value,'+plan_id+');" id="pc_title" name="pc_title'+plan_id+'" type="text" class="form-control youtube-field" placeholder="Enter Title" maxlength="100"><span style="display: none;" class="text-danger title-span"></span><span id="pc_titleErr" class="text-danger"></span></div><div class="form-group mb-2 written_content"><label for="written_content" class="col-form-label written_content_label">Written Content </label><textarea maxlength="5000" onkeyup="return onWrittenContentChange(this.value,'+plan_id+');" class="form-control" id="written_content" name="written_content'+plan_id+'" rows="5" placeholder="Enter Written Content"></textarea><span style="display:none;" class="text-danger written-content-span"></span><span id="written_contentErr" class="text-danger"></span></div><div class="form-group mb-2 written-content-2" style="display:none;"><label for="written_content" class="col-form-label written_content_2_label">Written Content 2</label><textarea maxlength="500" onkeyup="return onWrittenContent2Change(this.value,'+plan_id+');" class="form-control" id="written_content_2" name="written_content_2'+plan_id+'" rows="5" placeholder="Enter Written Content 2"></textarea><span style="display:none;" class="text-danger written-content-2-span"></span><span id="written_content_2Err" class="text-danger"></span></div><div class="form-group mb-2 blog-field-div" style="display:none;"><label for="target_audience" class="col-form-label target_audience_label">Target Audience</label><input id="target_audience" name="target_audience'+plan_id+'" type="text" class="form-control blog-field" placeholder="Enter Target Audience"><span style="display: none;" class="text-danger target_audience-span"></span><span id="target_audienceErr" class="text-danger"></span></div><div class="form-group mb-2 blog-field-div" style="display:none;"><label for="solutions" class="col-form-label solutions_label">Solutions</label><input id="solutions" name="solutions'+plan_id+'" type="text" class="form-control blog-field" placeholder="Enter Solutions"><span style="display: none;" class="text-danger solutions-span"></span><span id="solutionsErr" class="text-danger"></span></div><div class="form-group mb-2 blog-field-div" style="display:none;"><label for="keywords" class="col-form-label keywords_label">Keywords</label><input id="keywords" name="keywords'+plan_id+'" type="text" class="form-control blog-field" placeholder="Enter Keywords"><span style="display: none;" class="text-danger keywords-span"></span><span id="keywordsErr" class="text-danger"></span></div><div class="form-group mb-2 blog-field-div" style="display:none;"><label for="internal_links" class="col-form-label internal_links_label">Internal Links</label><input id="internal_links" name="internal_links'+plan_id+'" type="text" class="form-control blog-field" placeholder="Enter Internal Links"><span style="display: none;" class="text-danger internal_links-span"></span><span id="internal_linksErr" class="text-danger"></span></div><div class="form-group mb-2 blog-field-div" style="display:none;"><label for="external_links" class="col-form-label external_links_label">External Links</label><input id="external_links" name="external_links'+plan_id+'" type="text" class="form-control blog-field" placeholder="Enter External Links"><span style="display: none;" class="text-danger external_links-span"></span><span id="external_linksErr" class="text-danger"></span></div><div class="form-group mb-2 blog-field-div" style="display:none;"><label for="meta_title" class="col-form-label meta_title_label">Meta title</label><input id="meta_title" name="meta_title'+plan_id+'" type="text" class="form-control blog-field" placeholder="Enter Meta title"><span style="display: none;" class="text-danger meta_title-span"></span><span id="meta_titleErr" class="text-danger"></span></div><div class="form-group mb-2 blog-field-div" style="display:none;"><label for="meta_description" class="col-form-label meta_description_label">Meta Description</label><textarea maxlength="5000" id="meta_description" name="meta_description'+plan_id+'" class="form-control blog-field" rows="5" placeholder="Enter Meta Description"></textarea><span style="display: none;" class="text-danger meta_description-span"></span><span id="meta_descriptionErr" class="text-danger"></span></div><div class="form-group mb-2 tags" style="display:none;"><label for="tags" class="col-form-label tags_label">Tags</label><textarea maxlength="400" class="form-control" id="tags" name="tags'+plan_id+'" rows="5" placeholder="Add Tag"></textarea><span style="display:none;" class="text-danger tags-span"></span><span id="tagsErr" class="text-danger"></span></div><div class="form-group mb-2 pc_file"><label class="col-form-label pc_file_label">Attach Media </label><input type="hidden" name="total_content[]" id="total_content" value="'+plan_id+'"><input class="form-control limitInputCPFiles'+plan_id+'" name="pc_file'+plan_id+'[]" id="pc_file" type="file" accept="video/*,image/*" multiple="" /><span id="limitInputCPFilesErr'+plan_id+'" class="text-danger"></span><span id="pc_file'+plan_id+'Err" class="text-danger"></span></div><div class="form-group mb-2 blog-field-div" style="display: none;"><label class="col-form-label pc_file_label">Attach Documents </label><input class="form-control blog-field" name="doc_pc_file'+plan_id+'[]" id="doc_pc_file" type="file" multiple="" /><span id="doc_pc_file'+plan_id+'Err" class="text-danger"></span></div></div><div class="col-md-6" style="margin-top: 90px;"><div class="form-group mb-2"><label for="written_content_assignee" class="col-form-label written_content_assignee_label">Assignee for Written Content </label><select name="written_content_assignee'+plan_id+'" id="written_content_assignee'+plan_id+'" class="form-control select2 written_content_assignee"  style="line-height: 1.5;"><option value="<?php echo $this->session->userdata('d168_id');?>">Assign To Me</option></select><span id="written_content_assigneeErr" class="text-danger"></span></div><div class="form-group mb-2"><label for="pc_file_assignee" class="col-form-label pc_file_assignee_label">Assignee for Media files </label><select name="pc_file_assignee'+plan_id+'" id="pc_file_assignee'+plan_id+'" class="form-control select2 pc_file_assignee"  style="line-height: 1.5;"><option value="<?php echo $this->session->userdata('d168_id');?>">Assign To Me</option></select><span id="pc_file_assigneeErr" class="text-danger"></span></div><div class="form-group mb-2"><label for="submit_to_approval" class="col-form-label submit_to_approval_label">Submit for Approval </label><select name="submit_to_approval'+plan_id+'" id="submit_to_approval'+plan_id+'" class="form-control select2 submit_to_approval"  style="line-height: 1.5;"><option value="<?php echo $this->session->userdata('d168_id');?>">Assign To Me</option></select><span id="submit_to_approvalErr" class="text-danger"></span></div><div class="form-group mb-2"><label for="pc_assignee" class="col-form-label pc_assignee_label">Schedular </label><select name="pc_assignee'+plan_id+'" id="pc_assignee'+plan_id+'" class="form-control select2 pc_assignee"  style="line-height: 1.5;"><option value="<?php echo $this->session->userdata('d168_id');?>">Assign To Me</option><option value=""><span>None</span></option></select><span id="pc_assigneeErr" class="text-danger"></span></div></div><div class="row mb-2"><label class="col-form-label col-lg-12 pc_link_label">Link(s) & Comment(s)</label><div class="col-lg-5"><input id="pc_link" name="pc_link'+plan_id+'[]" type="text" class="form-control" placeholder="Enter Link"><span id="pc_linkErr" class="text-danger"></span></div><div class="col-lg-5"><input id="pc_link_comment" name="pc_link_comment'+plan_id+'[]" type="text" class="form-control" placeholder="Enter Link Comment"><span id="pc_link_commentErr" class="text-danger"></span></div><div class="col-lg-2"><button type="button" class="add_dup_pc_link'+plan_id+' btn btn-d btn-sm">Add Another link</button></div></div><div class="pc_link_div'+plan_id+'"></div><span id="link_validErr'+plan_id+'" class="text-danger"></span><br><div class="row float-end"><div class="justify-content-end float-end"><button style="float:right;" type="button" class="btn btn-sm bg-d text-white remove_plan_content">Remove Content</button></div></div></div></div>';
        $(plan_content_wrapper).append(plan_wrapperHTML); 
        $('.plan-content-wrapper textarea, .plan-content-wrapper #pc_title').maxlength({
          alwaysShow: true,
          warningClass: "badge bg-info",
          limitReachedClass: "badge bg-warning"
        });
        var tproject_assign= $("#pid").val(); 
        $.ajax({
            url: base_url+'front/select_project_assignees',
            method: 'POST',
            data: {pid:tproject_assign},  
            success: function(data) {
                $('.plan-content-wrapper').find('#written_content_assignee'+plan_id).html(data.assignees);
                $('.plan-content-wrapper').find('#pc_file_assignee'+plan_id).html(data.assignees);
                $('.plan-content-wrapper').find('#submit_to_approval'+plan_id).html(data.assignees);
                $('.plan-content-wrapper').find('#pc_assignee'+plan_id).html(data.none_assignee);   

                var prev_wca = $('.plan-content-wrapper').find('#written_content_assignee'+current_plan_id).val();      
                var prev_pfa = $('.plan-content-wrapper').find('#pc_file_assignee'+current_plan_id).val();      
                var prev_sta = $('.plan-content-wrapper').find('#submit_to_approval'+current_plan_id).val();      
                var prev_pa = $('.plan-content-wrapper').find('#pc_assignee'+current_plan_id).val(); 
                     
                $('.plan-content-wrapper').find('#written_content_assignee'+plan_id).val(prev_wca);    
                $('.plan-content-wrapper').find('#pc_file_assignee'+plan_id).val(prev_pfa);    
                $('.plan-content-wrapper').find('#submit_to_approval'+plan_id).val(prev_sta);    
                $('.plan-content-wrapper').find('#pc_assignee'+plan_id).val(prev_pa);      
            }
        });

        var pc_linkHTML = '<div class="row mb-2"><label class="col-form-label col-lg-12"></label><div class="col-lg-5"><input id="pc_link" name="pc_link'+plan_id+'[]" type="text" class="form-control" placeholder="Enter Link"><span id="pc_linkErr" class="text-danger"></span></div><div class="col-lg-5"><input id="pc_link_comment" name="pc_link_comment'+plan_id+'[]" type="text" class="form-control" placeholder="Enter Link Comment"><span id="pc_link_commentErr" class="text-danger"></span></div><div class="col-lg-2 card-title mb-2"><button type="button" class="btn btn-light position-relative p-0 avatar-xs rounded-circle add_dup_pc_link_sec'+plan_id+'" style="margin-left: 30px;"><span class="avatar-title bg-transparent text-reset"><i class="bx bx-plus"></i></span></button><button type="button" class="btn btn-light position-relative p-0 avatar-xs rounded-circle remove_dup_pc_link'+plan_id+'" style="margin-left: 15px;"><span class="avatar-title bg-transparent text-reset"><i class="bx bx-minus"></i></span></button></div></div>'; //New input field html
        var a = 1; //Initial field counter is 1
       
        //Once add button is clicked
        $('.add_dup_pc_link'+plan_id).on('click',function(e){
            $('.pc_link_div'+plan_id).append(pc_linkHTML); //Add field html
        });

        $('.pc_link_div'+plan_id).on('click', '.add_dup_pc_link_sec'+plan_id, function(e){
            $('.pc_link_div'+plan_id).append(pc_linkHTML); 
        });

        //Once remove button is clicked
        $('.pc_link_div'+plan_id).on('click', '.remove_dup_pc_link'+plan_id, function(e){
           e.preventDefault();
           $(this).parent('div').parent('div').remove(); //Remove field html
           a--; //Decrement field counter
        });

        $('.remove_plan_content').on('click',function(e){
            e.preventDefault();
           $(this).parent('div').parent('div').parent('div').parent('div').remove(); //Remove field html
        });

        $('.limitInputCPFiles'+plan_id).change(function() {
          
            var platform = $('.InputPlatformCP'+plan_id+':checked').val();
            if(platform == 'twitter')
            {
              if (this.files.length > 4)
              {
                $('#limitInputCPFilesErr'+plan_id).html('Too Many Files Attached');
                $(this).val('');
              }else{
                $('#limitInputCPFilesErr'+plan_id).html('');
              }
            } 
            if(platform == 'facebook')
            {
              if (this.files.length > 6)
              {
                $('#limitInputCPFilesErr'+plan_id).html('Too Many Files Attached');
                $(this).val('');
              }else{
                $('#limitInputCPFilesErr'+plan_id).html('');
              }
            }
            if(platform == 'instagram')
            {
              if (this.files.length > 10)
              {
                $('#limitInputCPFilesErr'+plan_id).html('Too Many Files Attached');
                $(this).val('');
              }else{
                $('#limitInputCPFilesErr'+plan_id).html('');
              }
            }
            if(platform == 'linkedin')
            {
              if (this.files.length > 1)
              {
                $('#limitInputCPFilesErr'+plan_id).html('Too Many Files Attached');
                $(this).val('');
              }else{
                $('#limitInputCPFilesErr'+plan_id).html('');
              }
            }
            if(platform == 'google-my-business')
            {
              if (this.files.length > 10)
              {
                $('#limitInputCPFilesErr'+plan_id).html('Too Many Files Attached');
                $(this).val('');
              }else{
                $('#limitInputCPFilesErr'+plan_id).html('');
              }
            }
            if(platform == 'pinterest')
            {
              if (this.files.length > 5)
              {
                $('#limitInputCPFilesErr'+plan_id).html('Too Many Files Attached');
                $(this).val('');
              }else{
                $('#limitInputCPFilesErr'+plan_id).html('');
              }
            }
            if(platform == 'youtube')
            {
              if (this.files.length > 1)
              {
                $('#limitInputCPFilesErr'+plan_id).html('Too Many Files Attached');
                $(this).val('');
              }else{
                $('#limitInputCPFilesErr'+plan_id).html('');
              }
            }
            if(platform == 'blogger')
            {
              if (this.files.length > 4)
              {
                $('#limitInputCPFilesErr'+plan_id).html('Too Many Files Attached');
                $(this).val('');
              }else{
                $('#limitInputCPFilesErr'+plan_id).html('');
              }
            }
            if(platform == 'tiktok')
            {
              if (this.files.length > 1)
              {
                $('#limitInputCPFilesErr'+plan_id).html('Too Many Files Attached');
                $(this).val('');
              }else{
                $('#limitInputCPFilesErr'+plan_id).html('');
              }
            }    
          });
    });
});

function platformChanges(platform,id){
    var plan_content_id = $('#plan-content-'+id);
    if(platform == 'twitter'){
        plan_content_id.find('.platform-button-'+id).html('Twitter');
        plan_content_id.find('.youtube-title').css('display','none');
        plan_content_id.find('.tags').css('display','none');
        // plan_content_id.find('#pc_title').prop('required',false);
        plan_content_id.find('.written-content-2').css('display','none');
        plan_content_id.find('.written_content_label').html('Written Content ');
        plan_content_id.find('.written_content_assignee_label').html('Assignee for Written Content ');
        plan_content_id.find('#written_content').attr('placeholder', 'Enter Written Content');
        plan_content_id.find('#written_content').attr('maxlength','280');
        plan_content_id.find('#pc_title').val('');
        plan_content_id.find('#written_content').val('');
        plan_content_id.find('.title-span').html('');
        plan_content_id.find('.title-span').css('display','none');
        plan_content_id.find('.written-content-span').html('');
        plan_content_id.find('.written-content-span').css('display','none');
        plan_content_id.find('.written-content-2-span').html('');
        plan_content_id.find('.written-content-2-span').css('display','none');
        plan_content_id.find('.blog-field').val('');
        plan_content_id.find('.blog-field-div').css('display','none');
    }else if(platform == 'facebook'){
        plan_content_id.find('.platform-button-'+id).html('Facebook');
        plan_content_id.find('.youtube-title').css('display','none');
        plan_content_id.find('.tags').css('display','none');
        // plan_content_id.find('#pc_title').prop('required',false);
        plan_content_id.find('.written-content-2').css('display','none');
        plan_content_id.find('.written_content_label').html('Written Content ');
        plan_content_id.find('.written_content_assignee_label').html('Assignee for Written Content ');
        plan_content_id.find('#written_content').attr('placeholder', 'Enter Written Content');
        plan_content_id.find('#written_content').attr('maxlength','63206');
        plan_content_id.find('#pc_title').val('');
        plan_content_id.find('#written_content').val('');
        plan_content_id.find('.title-span').html('');
        plan_content_id.find('.title-span').css('display','none');
        plan_content_id.find('.written-content-span').html('');
        plan_content_id.find('.written-content-span').css('display','none');
        plan_content_id.find('.written-content-2-span').html('');
        plan_content_id.find('.written-content-2-span').css('display','none');
        plan_content_id.find('.blog-field').val('');
        plan_content_id.find('.blog-field-div').css('display','none');
    }else if(platform == 'instagram'){
        plan_content_id.find('.platform-button-'+id).html('Instagram');
        plan_content_id.find('.youtube-title').css('display','none');
        plan_content_id.find('.tags').css('display','none');
        // plan_content_id.find('#pc_title').prop('required',false);
        plan_content_id.find('.written-content-2').css('display','none');
        plan_content_id.find('.written_content_label').html('Written Content ');
        plan_content_id.find('.written_content_assignee_label').html('Assignee for Written Content ');
        plan_content_id.find('#written_content').attr('placeholder', 'Enter Written Content');
        plan_content_id.find('#written_content').attr('maxlength','2200');
        plan_content_id.find('#pc_title').val('');
        plan_content_id.find('#written_content').val('');
        plan_content_id.find('.title-span').html('');
        plan_content_id.find('.title-span').css('display','none');
        plan_content_id.find('.written-content-span').html('');
        plan_content_id.find('.written-content-span').css('display','none');
        plan_content_id.find('.written-content-2-span').html('');
        plan_content_id.find('.written-content-2-span').css('display','none');
        plan_content_id.find('.blog-field').val('');
        plan_content_id.find('.blog-field-div').css('display','none');
    }else if(platform == 'linkedin'){
        plan_content_id.find('.platform-button-'+id).html('LinkedIn');
        plan_content_id.find('.youtube-title').css('display','none');
        plan_content_id.find('.tags').css('display','none');
        // plan_content_id.find('#pc_title').prop('required',false);
        plan_content_id.find('.written-content-2').css('display','none');
        plan_content_id.find('.written_content_label').html('Written Content ');
        plan_content_id.find('.written_content_assignee_label').html('Assignee for Written Content ');
        plan_content_id.find('#written_content').attr('placeholder', 'Enter Written Content');
        plan_content_id.find('#written_content').attr('maxlength','2985');
        plan_content_id.find('#pc_title').val('');
        plan_content_id.find('#written_content').val('');
        plan_content_id.find('.title-span').html('');
        plan_content_id.find('.title-span').css('display','none');
        plan_content_id.find('.written-content-span').html('');
        plan_content_id.find('.written-content-span').css('display','none');
        plan_content_id.find('.written-content-2-span').html('');
        plan_content_id.find('.written-content-2-span').css('display','none');
        plan_content_id.find('.blog-field').val('');
        plan_content_id.find('.blog-field-div').css('display','none');
    }else if(platform == 'google-my-business'){
        plan_content_id.find('.platform-button-'+id).html('Google My Business');
        plan_content_id.find('.youtube-title').css('display','none');
        plan_content_id.find('.tags').css('display','none');
        // plan_content_id.find('#pc_title').prop('required',false);
        plan_content_id.find('.written-content-2').css('display','none');
        plan_content_id.find('.written_content_label').html('Written Content ');
        plan_content_id.find('.written_content_assignee_label').html('Assignee for Written Content ');
        plan_content_id.find('#written_content').attr('placeholder', 'Enter Written Content');
        plan_content_id.find('#written_content').attr('maxlength','1500');
        plan_content_id.find('#pc_title').val('');
        plan_content_id.find('#written_content').val('');
        plan_content_id.find('.title-span').html('');
        plan_content_id.find('.title-span').css('display','none');
        plan_content_id.find('.written-content-span').html('');
        plan_content_id.find('.written-content-span').css('display','none');
        plan_content_id.find('.written-content-2-span').html('');
        plan_content_id.find('.written-content-2-span').css('display','none');
        plan_content_id.find('.blog-field').val('');
        plan_content_id.find('.blog-field-div').css('display','none');
    }else if(platform == 'pinterest'){
        plan_content_id.find('.platform-button-'+id).html('Pinterest');
        plan_content_id.find('.youtube-title').css('display','block');
        plan_content_id.find('.tags').css('display','none');
        // plan_content_id.find('#pc_title').prop('required',true);
        plan_content_id.find('.written-content-2').css('display','block');
        plan_content_id.find('.written_content_label').html('Written Content 1 ');
        plan_content_id.find('.written_content_assignee_label').html('Assignee for Written Content  ');
        plan_content_id.find('#written_content').attr('placeholder', 'Enter Written Content 1');
        plan_content_id.find('#written_content').attr('maxlength','500');
        plan_content_id.find('#pc_title').val('');
        plan_content_id.find('#written_content').val('');
        plan_content_id.find('.title-span').html('');
        plan_content_id.find('.title-span').css('display','none');
        plan_content_id.find('.written-content-span').html('');
        plan_content_id.find('.written-content-span').css('display','none');
        plan_content_id.find('.written-content-2-span').html('');
        plan_content_id.find('.written-content-2-span').css('display','none');
        plan_content_id.find('.blog-field').val('');
        plan_content_id.find('.blog-field-div').css('display','none');
    }else if(platform == 'youtube'){
        plan_content_id.find('.platform-button-'+id).html('YouTube');
        plan_content_id.find('.youtube-title').css('display','block');
        plan_content_id.find('.tags').css('display','block');
        // plan_content_id.find('#pc_title').prop('required',true);
        plan_content_id.find('.written-content-2').css('display','none');
        plan_content_id.find('.written_content_label').html('Description ');
        plan_content_id.find('.written_content_assignee_label').html('Assignee for Description ');
        plan_content_id.find('#written_content').attr('placeholder', 'Enter Description');
        plan_content_id.find('#written_content').attr('maxlength','5000');
        plan_content_id.find('#pc_title').val('');
        plan_content_id.find('#written_content').val('');
        plan_content_id.find('.title-span').html('');
        plan_content_id.find('.title-span').css('display','none');
        plan_content_id.find('.written-content-span').html('');
        plan_content_id.find('.written-content-span').css('display','none');
        plan_content_id.find('.written-content-2-span').html('');
        plan_content_id.find('.written-content-2-span').css('display','none');
        plan_content_id.find('.blog-field').val('');
        plan_content_id.find('.blog-field-div').css('display','none');
    }else if(platform == 'blogger'){
        plan_content_id.find('.platform-button-'+id).html('Blog');
        plan_content_id.find('.youtube-title').css('display','block');
        plan_content_id.find('.tags').css('display','none');
        // plan_content_id.find('#pc_title').prop('required',true);
        plan_content_id.find('.written-content-2').css('display','none');
        plan_content_id.find('.written_content_label').html('Written Content ');
        plan_content_id.find('.written_content_assignee_label').html('Assignee for Written Content ');
        plan_content_id.find('#written_content').attr('placeholder', 'Enter Written Content');
        plan_content_id.find('#written_content').attr('maxlength','50000');
        plan_content_id.find('#pc_title').val('');
        plan_content_id.find('#written_content').val('');
        plan_content_id.find('.title-span').html('');
        plan_content_id.find('.title-span').css('display','none');
        plan_content_id.find('.written-content-span').html('');
        plan_content_id.find('.written-content-span').css('display','none');
        plan_content_id.find('.written-content-2-span').html('');
        plan_content_id.find('.written-content-2-span').css('display','none');
        plan_content_id.find('.blog-field-div').css('display','block');
    }else if(platform == 'tiktok'){
        plan_content_id.find('.platform-button-'+id).html('TikTok');
        plan_content_id.find('.youtube-title').css('display','none');
        plan_content_id.find('.tags').css('display','none');
        // plan_content_id.find('#pc_title').prop('required',false);
        plan_content_id.find('.written-content-2').css('display','none');
        plan_content_id.find('.written_content_label').html('Written Content ');
        plan_content_id.find('.written_content_assignee_label').html('Assignee for Written Content ');
        plan_content_id.find('#written_content').attr('placeholder', 'Enter Written Content');
        plan_content_id.find('#written_content').attr('maxlength','100');
        plan_content_id.find('#pc_title').val('');
        plan_content_id.find('#written_content').val('');
        plan_content_id.find('.title-span').html('');
        plan_content_id.find('.title-span').css('display','none');
        plan_content_id.find('.written-content-span').html('');
        plan_content_id.find('.written-content-span').css('display','none');
        plan_content_id.find('.written-content-2-span').html('');
        plan_content_id.find('.written-content-2-span').css('display','none');
        plan_content_id.find('.blog-field').val('');
        plan_content_id.find('.blog-field-div').css('display','none');
    }else{
        plan_content_id.find('.platform-button-'+id).html('Platform '+id);
        plan_content_id.find('.youtube-title').css('display','none');
        plan_content_id.find('.tags').css('display','none');
        // plan_content_id.find('#pc_title').prop('required',false);
        plan_content_id.find('.written-content-2').css('display','none');
        plan_content_id.find('.written_content_label').html('Written Content ');
        plan_content_id.find('.written_content_assignee_label').html('Assignee for Written Content ');
        plan_content_id.find('#written_content').attr('placeholder', 'Enter Written Content');
        plan_content_id.find('#written_content').attr('maxlength','5000');
        plan_content_id.find('#pc_title').val('');
        plan_content_id.find('#written_content').val('');
        plan_content_id.find('.title-span').html('');
        plan_content_id.find('.title-span').css('display','none');
        plan_content_id.find('.written-content-span').html('');
        plan_content_id.find('.written-content-span').css('display','none');
        plan_content_id.find('.written-content-2-span').html('');
        plan_content_id.find('.written-content-2-span').css('display','none');
        plan_content_id.find('.blog-field').val('');
        plan_content_id.find('.blog-field-div').css('display','none');
    }
}

function onWrittenContentChange(value,id){
    var plan_content_id = $('#plan-content-'+id);
    var platform = plan_content_id.find('#platform:checked').val();
    plan_content_id.find('.written-content-2-span').html('');
    plan_content_id.find('.written-content-2-span').css('display','none');
    plan_content_id.find('.title-span').html('');
    plan_content_id.find('.title-span').css('display','none');
    if(platform == 'twitter'){
        var character_count = 280;
        if(value.length > character_count){
            plan_content_id.find('.written-content-span').css('display','block');
            plan_content_id.find('.written-content-span').html('Max characters allowed '+character_count+'.');
        }else{
            plan_content_id.find('.written-content-span').html('');
            plan_content_id.find('.written-content-span').css('display','none');
        }        
    }
    else if(platform == 'facebook'){
        var character_count = 63206;
        if(value.length > character_count){
            plan_content_id.find('.written-content-span').css('display','block');
            plan_content_id.find('.written-content-span').html('Max characters allowed '+character_count+'.');
        }else{
            plan_content_id.find('.written-content-span').html('');
            plan_content_id.find('.written-content-span').css('display','none');
        } 
    }
    else if(platform == 'instagram'){
        var character_count = 2200;
        if(value.length > character_count){
            plan_content_id.find('.written-content-span').css('display','block');
            plan_content_id.find('.written-content-span').html('Max characters allowed '+character_count+'.');
        }else{
            plan_content_id.find('.written-content-span').html('');
            plan_content_id.find('.written-content-span').css('display','none');
        } 
    }
    else if(platform == 'linkedin'){
        var character_count = 2985;
        if(value.length > character_count){
            plan_content_id.find('.written-content-span').css('display','block');
            plan_content_id.find('.written-content-span').html('Max characters allowed '+character_count+'.');
        }else{
            plan_content_id.find('.written-content-span').html('');
            plan_content_id.find('.written-content-span').css('display','none');
        } 
    }
    else if(platform == 'google-my-business'){
        var character_count = 1500;
        if(value.length > character_count){
            plan_content_id.find('.written-content-span').css('display','block');
            plan_content_id.find('.written-content-span').html('Max characters allowed '+character_count+'.');
        }else{
            plan_content_id.find('.written-content-span').html('');
            plan_content_id.find('.written-content-span').css('display','none');
        } 
    }
    else if(platform == 'pinterest'){
        var character_count = 500;
        if(value.length > character_count){
            plan_content_id.find('.written-content-span').css('display','block');
            plan_content_id.find('.written-content-span').html('Max characters allowed '+character_count+'.');
        }else{
            plan_content_id.find('.written-content-span').html('');
            plan_content_id.find('.written-content-span').css('display','none');
        } 
    }
    else if(platform == 'youtube'){
        var character_count = 5000;
        if(value.length > character_count){
            plan_content_id.find('.written-content-span').css('display','block');
            plan_content_id.find('.written-content-span').html('Max characters allowed '+character_count+'.');
        }else{
            plan_content_id.find('.written-content-span').html('');
            plan_content_id.find('.written-content-span').css('display','none');
        } 
    }
    else if(platform == 'blogger'){
        var character_count = 50000;
        if(value.length > character_count){
            plan_content_id.find('.written-content-span').css('display','block');
            plan_content_id.find('.written-content-span').html('Max characters allowed '+character_count+'.');
        }else{
            plan_content_id.find('.written-content-span').html('');
            plan_content_id.find('.written-content-span').css('display','none');
        } 
    }
    else if(platform == 'tiktok'){
        var character_count = 100;
        if(value.length > character_count){
            plan_content_id.find('.written-content-span').css('display','block');
            plan_content_id.find('.written-content-span').html('Max characters allowed '+character_count+'.');
        }else{
            plan_content_id.find('.written-content-span').html('');
            plan_content_id.find('.written-content-span').css('display','none');
        } 
    }
    else{
        plan_content_id.find('.written-content-span').html('');
        plan_content_id.find('.written-content-span').css('display','none');
    }
}

function onWrittenContent2Change(value,id){
    var plan_content_id = $('#plan-content-'+id);
    var character_count = 500;
    if(value.length > character_count){
        plan_content_id.find('.written-content-2-span').css('display','block');
        plan_content_id.find('.written-content-2-span').html('Max characters allowed '+character_count+'.');
    }else{
        plan_content_id.find('.written-content-2-span').html('');
        plan_content_id.find('.written-content-2-span').css('display','none');
    }      
}

function onTitleChange(value,id){
    var plan_content_id = $('#plan-content-'+id);
    var character_count = 100;
    if(value.length > character_count){
        plan_content_id.find('.title-span').css('display','block');
        plan_content_id.find('.title-span').html('Max characters allowed '+character_count+'.');
    }else{
        plan_content_id.find('.title-span').html('');
        plan_content_id.find('.title-span').css('display','none');
    }        
}
</script>
    </body>

</html>