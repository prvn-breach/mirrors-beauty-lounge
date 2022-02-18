<template>
	<div id="content" class="flex">
                <!-- ############ Main START-->
                <div class="page-container">
                    <div class="pt-3 pr-3 pb-5 pl-3">
                        <div class="mb-5">
                            <h2 class="dv_page_heading">Add Attributes </h2>
                            <div class="row dv_search_delete_action_common">
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mb-3">
                                        <div class="card-header"><strong>Basic Details</strong></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize" for="name">Attributes title </label>
                                                        <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" value="Color">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize" for="name">Attributes Type </label>
                                                        <select class="form-control dv_common_select_for_all">
                                                            <option value="text">Text</option>
                                                                <option value="textarea">Textarea</option>
                                                                <option value="price">Price</option>
                                                                <option value="boolean">Boolean</option>
                                                                <option value="select">Select</option>
                                                                <option value="multiselect">Multiselect</option>
                                                                <option value="datetime">Datetime</option>
                                                                <option value="date">Date</option>
                                                                <option value="image">Image</option>
                                                                <option value="file">File</option>
                                                                <option value="checkbox">Checkbox</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-0">
                                                        <label class="text-muted text-capitalize" for="name">Attributes status </label>
                                                        <label class="ui-switch ui-switch-md info m-t-xs d-block mr-3"><input checked="" type="checkbox"> <i></i></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header"><strong>Attributes Option </strong></div>
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-theme table-row v-middle">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10%; text-align: center;">sr no</th>
                                                            <th style="width: 40%;">option name</th>
                                                            <th style="width: 30%;">image </th>
                                                            <th style="width: 10%;">status</th>
                                                            <th style="width: 20%;">action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">1</td>
                                                            <td><input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" value="Red"></td>
                                                            <td><input type="file" class="form-control dv_common_input_for_all" placeholder="Enter"></td>
                                                            <td><label class="ui-switch ui-switch-md info m-t-xs d-block mr-3"><input checked="" type="checkbox"> <i></i></label></td>
                                                            <td>
                                                                <svg data-toggle="tooltip" data-placement="top" data-original-title="Delete Option" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger dv_row_action_drp_svg_eye"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">2</td>
                                                            <td><input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" value="Blue"></td>
                                                            <td><input type="file" class="form-control dv_common_input_for_all" placeholder="Enter"></td>
                                                            <td><label class="ui-switch ui-switch-md info m-t-xs d-block mr-3"><input checked="" type="checkbox"> <i></i></label></td>
                                                            <td>
                                                                <svg data-toggle="tooltip" data-placement="top" data-original-title="Delete Option" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger dv_row_action_drp_svg_eye"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">3</td>
                                                            <td><input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" value="White"></td>
                                                            <td><input type="file" class="form-control dv_common_input_for_all" placeholder="Enter"></td>
                                                            <td><label class="ui-switch ui-switch-md info m-t-xs d-block mr-3"><input checked="" type="checkbox"> <i></i></label></td>
                                                            <td>
                                                                <svg data-toggle="tooltip" data-placement="top" data-original-title="Delete Option" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger dv_row_action_drp_svg_eye"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">4</td>
                                                            <td><input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" value="Gold"></td>
                                                            <td><input type="file" class="form-control dv_common_input_for_all" placeholder="Enter"></td>
                                                            <td><label class="ui-switch ui-switch-md info m-t-xs d-block mr-3"><input checked="" type="checkbox"> <i></i></label></td>
                                                            <td>
                                                                <svg data-toggle="tooltip" data-placement="top" data-original-title="Delete Option" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger dv_row_action_drp_svg_eye"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">5</td>
                                                            <td><input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" value="Silver"></td>
                                                            <td><input type="file" class="form-control dv_common_input_for_all" placeholder="Enter"></td>
                                                            <td><label class="ui-switch ui-switch-md info m-t-xs d-block mr-3"><input checked="" type="checkbox"> <i></i></label></td>
                                                            <td>
                                                                <svg data-toggle="tooltip" data-placement="top" data-original-title="Delete Option" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger dv_row_action_drp_svg_eye"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">6</td>
                                                            <td><input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" value="Brown"></td>
                                                            <td><input type="file" class="form-control dv_common_input_for_all" placeholder="Enter"></td>
                                                            <td><label class="ui-switch ui-switch-md info m-t-xs d-block mr-3"><input checked="" type="checkbox"> <i></i></label></td>
                                                            <td>
                                                                <svg data-toggle="tooltip" data-placement="top" data-original-title="Add New" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header"><strong>SEO Details</strong></div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">SEO Title</label>
                                                <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">SEO keywords </label>
                                                <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                            <div class="form-group m-0">
                                                <label class="text-muted text-capitalize" for="name">Description </label>
                                                <textarea class="form-control dv_common_textarea_for_all" rows="6" style="resize: none;" placeholder="Enter"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn">cancel</button>
                                    <button type="button" class="btn btn-default dv_save_submit_btn">save </button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- ############ Main END-->
            </div>
</template>