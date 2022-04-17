<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>

<!DOCTYPE html> 

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Home</title> 
        <?php include('default/header.php'); ?>
    </head> 
  
    <body>
        <?php include('default/topbar.php'); ?>
        <main>
            <?php //var_dump($data); ?>
            <div class="px-5 mx-5" id="main">
                <div class="row mt-5">
                    <div class="col-lg-3 col-md-4 bg-white p-3">
                        <div class="card mb-5 bg-light border border-light p-3">
                            <div class="card-body">
                                <div class="text-center">
                                    <img class="border border-5 border-success rounded-circle" style="width: 150px; height: 150px;" src="<?= check_dp($data['faculty']['profile']);?>" alt="">
                                    <h4 class="mt-3 mb-0"><?= $data['faculty']['fname']. ' ' .$data['faculty']['lname']; ?></h4>
                                    <p class="mb-0"><?php if($data['faculty']['position'] == "") echo "Instructor"; else echo $data['faculty']['position']; ?></p>
                                </div>
                                <div class="mt-3 border-1 border-bottom mb-4">
                                    <div class="d-flex flex-row align-items-between justify-content-between">
                                        <div class="d-flex flex-row align-items-center justify-content-center">
                                            <i class="fas fa-chalkboard-user fs-4 mb-2"></i>
                                            <h6 class="text-center px-2">Class</h6>
                                        </div>
                                        <span class="fs-4"><?= $data['total_class']['total']; ?></span>
                                    </div>
                                </div>
                                <div class="mt-3 border-1 border-bottom mb-4">
                                    <div class="d-flex flex-row align-items-between justify-content-between">
                                        <div class="d-flex flex-row align-items-center justify-content-center">
                                            <i class="fas fa-users fs-4 mb-2"></i> 
                                            <h6 class="text-center px-2">Student</h6>
                                        </div>
                                        <span class="fs-4"><?= $data['total_students']['total']; ?></span>
                                    </div>
                                </div>
                                <div class="text-center"><a href="<?= site_url('faculty/myprofile/'. encrypt_id($data['faculty']['user_id'])); ?>" title="">My Profile</a></div>
                            </div>
                        </div>

                        <!-- <div class="list-group">
                            <div id="message"></div>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-row justify-content-between align-items-center">
                                        <img class="border border-1 border-success rounded-circle" style="width: 30px; height: 30px;" src="<?php echo BASE_URL . PUBLIC_DIR.'/assets/img/Noel.png';?>" alt="">
                                        <p class="px-2 m-0">Noel Dimailig</p>
                                    </div>
                                    <div class="d-flex flex-row w-25 justify-content-between align-items-center">
                                        <input type="submit" value="&#x2716;" class="btn btn-secondary btn-sm">
                                        <input type="submit" value="&#x2714;" class="btn btn-success btn-sm">
                                    </div>
                                </div>
                            </a>
                        </div> -->
                    </div>
                    <div class="col-lg-9 col-md-6 bg-white p-3">
                        <div class="bg-light">
                            <div class="d-flex flex-column align-items-start justify-content-center p-3 pt-0 bg-white w-100">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-announcement-tab" data-bs-toggle="tab" data-bs-target="#nav-announcement"
                                        type="button" role="tab" aria-controls="nav-announcement" aria-selected="true">Announcement</button>
                                        <button class="nav-link" id="nav-activity-tab" data-bs-toggle="tab" data-bs-target="#nav-activity"
                                        type="button" role="tab" aria-controls="nav-activity" aria-selected="false">Activity</button>
                                    </div>
                                </nav>    
                                <div class="tab-content w-100" id="nav-tabContent">
                                    <div class="tab-pane fade show active p-3 border rounded" id="nav-announcement" role="tabpanel" aria-labelledby="nav-announcement-tab">
                                        <div class="d-flex align-items-center justify-content-between border border-secondary  rounded p-3 mb-3">
                                            <p class="m-0">Create announcement</p>
                                            <div class="btn-group pull-right" role="group" aria-label="Basic mixed styles example" style="">
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#c-announcement">Post Announcements</button>
                                            </div>
                                        </div>
                                        <div class="list-group" id="created-announcement">
                                            <?php foreach($data['announcements'] as $announcement) : ?>
                                                <a class="list-group-item list-group-item-action mb-2 rounded border-top"
                                                 href="<?= site_url('classes/open/'. encrypt_id($announcement['user_id']) . '/' . $announcement['class_code']); ?>"
                                                >
                                                    <div>
                                                        <h5 class="mb-1"><?= $data['faculty']['fname'] . $data['faculty']['lname']; ?></h5>
                                                        <span class="text-mute mt-0 fs-6"> <i class="fa fa-clock-o"></i> <?= $announcement['date_posted']; ?></span>
                                                    </div><br>
                                                    <p><?= $announcement['content']; ?></p>
                                                <!-- <i class="fa fa-comments ms-3"></i> <span>Comments</span> 500  -->
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-3 border" id="nav-activity" role="tabpanel" aria-labelledby="nav-activity-tab">
                                        <div class="d-flex align-items-center justify-content-between border border-secondary  rounded p-3 mb-3">
                                            <p class="m-0">Assign Activity</p>
                                            <div class="btn-group pull-right" role="group" aria-label="Basic mixed styles example" style="">
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#c-activity">Assign Activity</button>
                                            </div>
                                        </div>
                                        <div class="list-group" id="created-activity">
                                            
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Modal Announcement -->
                                <div class="modal fade" id="c-announcement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="<?= site_url('classes/create_ann'); ?>" class="needs-validation" method="post" id="announce">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Create Announcement</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="c-message"></div>
                                                    <div class="col-md-12 mb-2">
                                                        <label for="c_course_id" class="form-label">Class</label>
                                                        <select class="form-control" id="c_course_id" name="c_course_id">
                                                            <?php foreach($data['classes'] as $class): ?>
                                                                <option value="<?php echo $class['course_id'];?>"><?= $class['section']. ' - ' .$class['room'];?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <label for="c_title" class="form-label">Title</label>
                                                        <input type="hidden" class="form-control form-control-sm" name="c_user_id" id="c_user_id" value="<?= encrypt_id($data['faculty']['user_id']); ?>">
                                                        <input type="hidden" class="form-control form-control-sm" name="c_course_id" id="c_course_id" value="<?= encrypt_id($class['course_id']); ?>">
                                                        <input type="hidden" class="form-control form-control-sm" name="c_user_name" id="c_user_name" value="<?= $data['faculty']['fname']. ' '.$data['faculty']['lname']; ?>">
                                                        <input type="text" class="form-control form-control-sm" name="c_title" id="c_title" placeholder="" maxlength="255" size="255" data-toggle="tooltip" data-placement="right" title="Title" required>
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <label for="c_content" class="form-label">Content</label>
                                                        <textarea name="c_content" id="c_content" class="form-control form-control-sm" cols="30" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-success" id="submit" name="submit" value="Post">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Activity -->
                                <div class="modal fade" id="c-activity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="<?= site_url('classes/create_act'); ?>" class="needs-validation" method="post" id="activity">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Assign Activity</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="c-message"></div>
                                                    <div class="col-md-12 mb-2">
                                                        <label for="c_course_id" class="form-label">Class</label>
                                                        <select class="form-control" id="c_course_id" name="c_course_id">
                                                            <?php foreach($data['classes'] as $class): ?>
                                                                <option value="<?php echo $class['course_id'];?>"><?= $class['section']. ' - ' .$class['room'];?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <label for="c_title" class="form-label">Title</label>
                                                        <input type="hidden" class="form-control form-control-sm" name="c_user_id" id="c_user_id" value="<?= encrypt_id($data['faculty']['user_id']); ?>">
                                                        <input type="hidden" class="form-control form-control-sm" name="c_course_id" id="c_course_id" value="<?= encrypt_id($class['course_id']); ?>">
                                                        <input type="hidden" class="form-control form-control-sm" name="c_user_name" id="c_user_name" value="<?= $data['faculty']['fname']. ' '.$data['faculty']['lname']; ?>">
                                                        <input type="text" class="form-control form-control-sm" name="c_title" id="c_title" placeholder="" maxlength="255" size="255" data-toggle="tooltip" data-placement="right" title="Title" required>
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <label for="c_content" class="form-label">Content</label>
                                                        <textarea name="c_content" id="c_content" class="form-control form-control-sm" cols="30" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-success" id="submit" name="submit" value="Post">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                        </div>

                        <!-- <div class="col-lg-3 col-md-3 bg-white p-3"> -->
                            <!-- <div class="card mb-5 bg-white border border-light">
                                <div class="d-flex justify-content-between p-3 py-2 pb-0 mb-2 border-bottom border-secondary bg-white">
                                    <p>Notifications</p>
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <div class="bg-info rounded-circle"><i class="fa-solid fa-file fs-5 p-3 text-white"></i></div>
                                            <div class="px-4">
                                                <small class="text-secondary">3 days ago</small>
                                                <p class="mb-1 fs-6">Some placeholder content in a paragraph.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <div class="bg-info rounded-circle"><i class="fa-solid fa-file fs-5 p-3 text-white"></i></div>
                                            <div class="px-4">
                                                <small class="text-secondary">3 days ago</small>
                                                <p class="mb-1 fs-6">Some placeholder content in a paragraph.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div> -->
                        <!-- </div> -->
                    </div> 
                </div>
            </div>     
        </main>
        <?php include('default/footer.php'); ?>
    </body> 
</html> 