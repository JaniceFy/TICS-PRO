<!-- footer @s -->
<div class="nk-footer">
    <div class="container-fluid">
        <div class="nk-footer-wrap">
            <div class="nk-footer-copyright"> &copy; 2024 JCode. Created By <a href="https://softnio.com" target="_blank">Janice Flores</a>
            </div>
            <!-- <div class="nk-footer-links">
                <ul class="nav nav-sm">
                    <li class="nav-item dropup">
                        <a href="#" class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-bs-toggle="dropdown" data-offset="0,10"><span>English</span></a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                            <ul class="language-list">
                                <li>
                                    <a href="#" class="language-item">
                                        <span class="language-name">English</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="language-item">
                                        <span class="language-name">Español</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="language-item">
                                        <span class="language-name">Français</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="language-item">
                                        <span class="language-name">Türkçe</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="modal" href="#region" class="nav-link"><em class="icon ni ni-globe"></em><span class="ms-1">Select Region</span></a>
                    </li>
                </ul>
            </div> -->

        </div>
    </div>
</div>
<!-- footer @e -->
</div>
<!-- wrap @e -->
</div>
<!-- main @e -->
</div>
<!-- app-root @e -->


<!-- Department -->
<div class="modal fade" id="addData">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross-sm"></em>
            </a>
            <div class="modal-body modal-body-md">
                <h5 class="modal-title">Add Employee</h5>
                <form action="#" class="mt-2">
                    <div class="row g-gs">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="name"> Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" placeholder="Abu Bin Istiak">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="email"> Email</label>
                                <div class="form-control-wrap">
                                    <input type="email" class="form-control" id="email" placeholder="info@softnio.com">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Department</label>
                                <div class="form-control-wrap">
                                    <select class="form-select js-select2">
                                        <option value="default_option">Select Department</option>
                                        <option value="bangladesh">Information Technology</option>
                                        <option value="canada">Finance</option>
                                        <option value="england">Marketing</option>
                                        <option value="pakistan">Human Resource</option>
                                        <option value="usa">Graphics</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="code">Designation</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="code" placeholder="Software developer">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="phone">Phone</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="phone" placeholder="+124 394-1787">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Address(Lane)</label>
                                <div class="form-control-wrap">
                                    <select class="form-select js-select2">
                                        <option value="default_option">Select Address</option>
                                        <option value="dhaka">House 165, Lane No 3, Mohakhali DOHS,Dhaka</option>
                                        <option value="london">199 Bishopsgate, London</option>
                                        <option value="mumbai">Narottam Morarji Marg, Mumbai</option>
                                        <option value="kualalampur">Ipoh, Johor Bahru, Kualalampur</option>
                                        <option value="spain">Gran Vía, Madrid.</option>
                                        <option value="usa">182/A Y-ra, Boston</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">Varified</label>
                                <div class="form-control-wrap">
                                    <ul class="custom-control-group g-3 align-center flex-wrap">
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" checked="" id="Check1">
                                                <label class="custom-control-label" for="Check1">Email</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" checked="" id="Check2">
                                                <label class="custom-control-label" for="Check2">KYC</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button data-bs-dismiss="modal" type="submit" class="btn btn-primary">Add Employee</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- .Edit Modal-Content -->
<div class="modal fade" id="editData">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross-sm"></em>
            </a>
            <div class="modal-body modal-body-md">
                <h5 class="modal-title">Edit Employee</h5>
                <form action="#" class="mt-2">
                    <div class="row g-gs">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="edit-name"> Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="edit-name" value="Abu Bin Istiak">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="edit-email"> Email</label>
                                <div class="form-control-wrap">
                                    <input type="email" class="form-control" id="edit-email" value="info@softnio.com">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="dept">Department</label>
                                <div class="form-control-wrap">
                                    <select class="form-select js-select2" id="dept">
                                        <option value="default_option">Select Department</option>
                                        <option value="bangladesh">Information Technology</option>
                                        <option value="canada">Finance</option>
                                        <option value="england">Marketing</option>
                                        <option value="pakistan">Human Resource</option>
                                        <option value="usa">Graphics</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="edit-code">Designation</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="edit-code" value="Software developer">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="edit-phone">Phone</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="edit-phone" value="+124 394-1787">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Address(Lane)</label>
                                <div class="form-control-wrap">
                                    <select class="form-select js-select2">
                                        <option value="default_option">Select Address</option>
                                        <option value="dhaka">House 165, Lane No 3, Mohakhali DOHS,Dhaka</option>
                                        <option value="london">199 Bishopsgate, London</option>
                                        <option value="mumbai">Narottam Morarji Marg, Mumbai</option>
                                        <option value="kualalampur">Ipoh, Johor Bahru, Kualalampur</option>
                                        <option value="spain">Gran Vía, Madrid.</option>
                                        <option value="usa">182/A Y-ra, Boston</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Varified</label>
                                <div class="form-control-wrap">
                                    <ul class="custom-control-group g-3 align-center flex-wrap">
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Email</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" checked="" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">KYC</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button data-bs-dismiss="modal" type="submit" class="btn btn-primary">Update Employee</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- .Edit Modal-Content -->
<div class="modal fade" id="deleteData">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross"></em></a>
            <div class="modal-body modal-body-sm text-center">
                <div class="nk-modal py-4">
                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                    <h4 class="nk-modal-title">Are You Sure ?</h4>
                    <div class="nk-modal-text mt-n2">
                        <p class="text-soft">This item will be removed permanently.</p>
                    </div>
                    <ul class="d-flex justify-content-center gx-4 mt-4">
                        <li>
                            <button data-bs-dismiss="modal" id="deleteEvent" class="btn btn-success">Yes, Delete it</button>
                        </li>
                        <li>
                            <button data-bs-dismiss="modal" data-toggle="modal" data-target="#editEventPopup" class="btn btn-danger btn-dim">Cancel</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!-- .Delete Modal-content -->
<!-- Dashboard -->
<div class="modal fade" id="editDataDash">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Edit Information</h5>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-group">
                        <label class="form-label" for="dept-name">Dept. Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="dept-name" value="Finance">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="author-name">Author Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="author-name" value="Abu Bin Istiak">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="designtn">Designation</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="designtn" value="Admin">
                        </div>
                    </div>
                    <div class="form-group">
                        <button data-bs-dismiss="modal" type="submit" class="btn btn-primary">Save Informations</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- .Edit Modal-Content -->
<!-- JavaScript -->
<script src="./assets/js/bundle.js?ver=3.2.4"></script>
<script src="./assets/js/scripts.js?ver=3.2.4"></script>
<script src="./assets/js/charts/chart-crm.js?ver=3.2.4"></script>
</body>

</html>