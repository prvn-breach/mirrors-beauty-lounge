<template>
	<div id="content" class="flex">   
                <div class="page-container">
                    <div class="pt-3 pr-3 pb-5 pl-3">
                        <div class="mb-5">
                            <h2 class="dv_page_heading">Attributes </h2>
                            <div class="row dv_search_delete_action_common">
                                <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                                    <input type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                                    <button type="text" class="btn btn-default dv_filter_common" data-toggle="tooltip" data-placement="top" title="Add Attribute">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                    </button>
                                    <button type="text" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download CSV">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                    </button>
                                    <button type="text" class="btn btn-default dv_selected_delete_common" data-toggle="tooltip" data-placement="top" title="Delete Selected Entries">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </button>
                                    <button type="text" class="btn btn-default dv_selected_filter_common" data-toggle="tooltip" data-placement="top" title="Filter">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                                    </button>
                                </div>
                            </div>
                            <div class="row mt-4 dv_filter_content_show" style="display: none;">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Filter </strong>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize d-block w-100" for="name">Filter 1</label>
                                                        <select class="form-control dv_common_select_for_all  w-100" id="select2-single" data-plugin="select2" multiple="">
                                                            <option>option 1</option> 
                                                            <option>option 2</option> 
                                                            <option>option 3</option> 
                                                            <option>option 4</option> 
                                                            <option>option 5</option> 
                                                            <option>option 1</option> 
                                                            <option>option 2</option> 
                                                            <option>option 3</option> 
                                                            <option>option 4</option> 
                                                            <option>option 5</option> 
                                                            <option>option 1</option> 
                                                            <option>option 2</option> 
                                                            <option>option 3</option> 
                                                            <option>option 4</option> 
                                                            <option>option 5</option> 
                                                            <option>option 1</option> 
                                                            <option>option 2</option> 
                                                            <option>option 3</option> 
                                                            <option>option 4</option> 
                                                            <option>option 5</option> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize" for="name">Filter 1</label>
                                                        <select class="form-control dv_common_select_for_all">
                                                            <option>option 1</option> 
                                                            <option>option 2</option> 
                                                            <option>option 3</option> 
                                                            <option>option 4</option> 
                                                            <option>option 5</option> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize" for="name">Filter 1</label>
                                                        <select class="form-control dv_common_select_for_all">
                                                            <option>option 1</option> 
                                                            <option>option 2</option> 
                                                            <option>option 3</option> 
                                                            <option>option 4</option> 
                                                            <option>option 5</option> 
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">
                                                <label class="ui-check m-0 ui-check-rounded ui-check-md"><input type="checkbox"> <i></i></label>
                                            </th>
                                            <th style="width: 10%;" class="text-muted sortable">ID</th>
                                            <th style="width: 35%;" class="text-muted">name</th>
                                            <th style="width: 20%;" class="text-muted">type</th>
                                            <th style="width: 15%;" class="text-muted">required</th>
                                            <th style="width: 15%;" class="text-muted">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="v-middle">
                                            <td>
                                                <label class="ui-check m-0 ui-check-rounded ui-check-md"><input type="checkbox"> <i></i></label>
                                            </td>
                                            <td>1</td>
                                            <td>Product Number </td>
                                            <td>text </td>
                                            <td>false </td>
                                            <td>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            </td>
                                        </tr>
                                        <tr class="v-middle">
                                            <td>
                                                <label class="ui-check m-0 ui-check-rounded ui-check-md"><input type="checkbox"> <i></i></label>
                                            </td>
                                            <td>1</td>
                                            <td>Brand </td>
                                            <td>text </td>
                                            <td>false </td>
                                            <td>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            </td>
                                        </tr>
                                        <tr class="v-middle">
                                            <td>
                                                <label class="ui-check m-0 ui-check-rounded ui-check-md"><input type="checkbox"> <i></i></label>
                                            </td>
                                            <td>1</td>
                                            <td>size </td>
                                            <td>text </td>
                                            <td>false </td>
                                            <td>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            </td>
                                        </tr>
                                        <tr class="v-middle">
                                            <td>
                                                <label class="ui-check m-0 ui-check-rounded ui-check-md"><input type="checkbox"> <i></i></label>
                                            </td>
                                            <td>1</td>
                                            <td>Color </td>
                                            <td>text </td>
                                            <td>false </td>
                                            <td>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            </td>
                                        </tr>
                                        <tr class="v-middle">
                                            <td>
                                                <label class="ui-check m-0 ui-check-rounded ui-check-md"><input type="checkbox"> <i></i></label>
                                            </td>
                                            <td>1</td>
                                            <td>Depth </td>
                                            <td>text </td>
                                            <td>false </td>
                                            <td>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            </td>
                                        </tr>
                                        <tr class="v-middle">
                                            <td>
                                                <label class="ui-check m-0 ui-check-rounded ui-check-md"><input type="checkbox"> <i></i></label>
                                            </td>
                                            <td>1</td>
                                            <td>Weight </td>
                                            <td>text </td>
                                            <td>false </td>
                                            <td>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            </td>
                                        </tr>
                                        <tr class="v-middle">
                                            <td>
                                                <label class="ui-check m-0 ui-check-rounded ui-check-md"><input type="checkbox"> <i></i></label>
                                            </td>
                                            <td>1</td>
                                            <td>Width </td>
                                            <td>text </td>
                                            <td>false </td>
                                            <td>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span> <span class="sr-only">Previous</span></a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span> <span class="sr-only">Next</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>              
            </div>
</template>