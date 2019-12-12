@extends('backend.layouts.app')

@section('title', __('Colores') . ' | ' . app_name())

@section('content')
    <div class="row">
        <div class="col-xl-6">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon kt-hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            State Colors
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-section">
                        <div class="kt-section__info">
                            You can apply Bootstrap and Metronic state color helper classes to the most of the Keen's components:
                        </div>
                        <div class="kt-section__content">
                            <div class="table-responsive">
                                <table class="table table-bordered table-head-solid">
                                    <thead>
                                    <tr>
                                        <th style="width: 150px">State</th>
                                        <th style="width: 200px">Class postfix</th>
                                        <th>Usage example</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="4"><span class="kt-font-bold">Bootstrap States</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="kt-badge kt-badge--inline kt-badge--success">Success</span></td>
                                        <td><code>*-success</code></td>
                                        <td><code>btn-success</code> <code>kt-font-success</code></td>
                                    </tr>
                                    <tr>
                                        <td><span class="kt-badge kt-badge--inline kt-badge--warning">Warning</span></td>
                                        <td><code>*-warning</code></td>
                                        <td><code>btn-warning</code> <code>kt-font-warning</code></td>
                                    </tr>
                                    <tr>
                                        <td><span class="kt-badge kt-badge--inline kt-badge--danger">Danger</span></td>
                                        <td><code>*-danger</code></td>
                                        <td><code>btn-danger</code> <code>kt-font-danger</code></td>
                                    </tr>
                                    <tr>
                                        <td><span class="kt-badge kt-badge--inline kt-badge--info">Info</span></td>
                                        <td><code>*-info</code></td>
                                        <td><code>btn-info</code> <code>kt-font-info</code></td>
                                    </tr>
                                    <tr>
                                        <td><span class="kt-badge kt-badge--inline kt-badge--primary">Primary</span></td>
                                        <td><code>*-primary</code></td>
                                        <td><code>btn-primary</code> <code>kt-font-primary</code></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><span class="kt-font-bold">Metronic Custom States</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="kt-badge kt-badge--inline kt-badge--brand">Brand</span></td>
                                        <td><code>*-brand</code></td>
                                        <td><code>btn-success</code> <code>kt-font-brand</code></td>
                                    </tr>
                                    <tr>
                                        <td><span class="kt-badge kt-badge--inline kt-badge--dark">Dark</span></td>
                                        <td><code>*-dark</code></td>
                                        <td><code>btn-dark</code> <code>kt-font-dark</code></td>
                                    </tr>
                                    <tr class="active">
                                        <td><span class="kt-badge kt-badge--inline kt-badge--light">Light</span></td>
                                        <td><code>*-light</code></td>
                                        <td><code>btn-light</code> <code>kt-font-light</code></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
        <div class="col-xl-6">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon kt-hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Base Colors
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <!--begin::Section-->
                    <div class="kt-section">
                        <div class="kt-section__info">
                            You can apply Keen's base color helper classes to the most of the Keen's components:
                        </div>
                        <div class="kt-section__content ">
                            <div class="table-responsive">
                                <table class="table table-bordered table-head-solid">
                                    <thead>
                                    <tr>
                                        <th style="width: 150px">Level</th>
                                        <th width="200">Preview</th>
                                        <th>Class example</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="4"><span class="kt-font-bold">Label Classes</span></td>
                                    </tr>
                                    <tr>
                                        <td>Level 1</td>
                                        <td>
                                            <span class="kt-label-font-color-1">Font Color</span>
                                            &nbsp;
                                            <span class="kt-label-bg-color-1" style="padding: 5px; color: #fff;">BG Color</span>
                                        </td>
                                        <td>
                                            <code>kt-label-font-color-1</code>&nbsp;
                                            <code>kt-label-bg-color-1</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Level 2</td>
                                        <td>
                                            <span class="kt-label-font-color-2">Font Color</span>
                                            &nbsp;
                                            <span class="kt-label-bg-color-2" style="padding: 5px;  color: #fff;">BG Color</span>
                                        </td>
                                        <td>
                                            <code>kt-label-font-color-2</code>&nbsp;
                                            <code>kt-label-bg-color-2</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Level 3</td>
                                        <td>
                                            <span class="kt-label-font-color-3">Font Color</span>
                                            &nbsp;
                                            <span class="kt-label-bg-color-3" style="padding: 5px; color: #fff;">BG Color</span>
                                        </td>
                                        <td>
                                            <code>kt-label-font-color-3</code>&nbsp;
                                            <code>kt-label-bg-color-3</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Level 4</td>
                                        <td>
                                            <span class="kt-label-font-color-4">Font Color</span>
                                            &nbsp;
                                            <span class="kt-label-bg-color-4" style="padding: 5px; color: #fff;">BG Color</span>
                                        </td>
                                        <td>
                                            <code>kt-label-font-color-4</code>&nbsp;
                                            <code>kt-label-bg-color-4</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><span class="kt-font-bold">Shape Classes</span></td>
                                    </tr>
                                    <tr>
                                        <td>Level 1</td>
                                        <td>
                                            <span class="kt-shape-font-color-1">Font Color</span>
                                            &nbsp;
                                            <span class="kt-shape-bg-color-1" style="padding: 5px; color: #fff;">BG Color</span>
                                        </td>
                                        <td>
                                            <code>kt-shape-font-color-1</code>&nbsp;
                                            <code>kt-shape-bg-color-1</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Level 2</td>
                                        <td>
                                            <span class="kt-shape-font-color-2">Font Color</span>
                                            &nbsp;
                                            <span class="kt-shape-bg-color-2" style="padding: 5px;  color: #fff;">BG Color</span>
                                        </td>
                                        <td>
                                            <code>kt-shape-font-color-2</code>&nbsp;
                                            <code>kt-shape-bg-color-2</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Level 3</td>
                                        <td>
                                            <span class="kt-shape-font-color-3">Font Color</span>
                                            &nbsp;
                                            <span class="kt-shape-bg-color-3" style="padding: 5px; color: #fff;">BG Color</span>
                                        </td>
                                        <td>
                                            <code>kt-shape-font-color-3</code>&nbsp;
                                            <code>kt-shape-bg-color-3</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Level 4</td>
                                        <td>
                                            <span class="kt-shape-font-color-4">Font Color</span>
                                            &nbsp;
                                            <span class="kt-shape-bg-color-4" style="padding: 5px; color: #fff;">BG Color</span>
                                        </td>
                                        <td>
                                            <code>kt-shape-font-color-4</code>&nbsp;
                                            <code>kt-shape-bg-color-4</code>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end::Section-->
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon kt-hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Base Color Palette
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-section">
                        <div class="kt-section__info">
                            <p class="text-center">
                                The dashboard will synergize with the colour selection made by the
                                user and appropriately amend. Similarly, all other elements will
                                sync according to the base colours.
                            </p>
                        </div>

                        <div class="kt-section__content">
                            <div class="color-primaries text-center">
                                <div class="bg-grey-200 grey-600">#eeeeee</div>
                                <div class="bg-grey-500">#9e9e9e</div>
                                <div class="bg-indigo-500">#3f51b5</div>
                                <div class="bg-cyan-500">#00bcd4</div>
                                <div class="bg-green-500">#4caf50</div>
                                <div class="bg-orange-500">#ff9800</div>
                                <div class="bg-red-500">#f44336</div>
                                <div class="bg-purple-500">#9c27b0</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon kt-hide">
                            <i class="la la-gear"></i>
                        </span>

                        <h3 class="kt-portlet__head-title">
                            Color Palette
                        </h3>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <div class="kt-section">
                        <div class="kt-section__info">
                            <p class="text-justify">This color palette comprises primary and accent colors that can be
                                used for illustration or to develop your brand colors.
                                They've been designed to work harmoniously with each other.
                            </p>

                            <p class="text-justify">The color palette starts with primary colors and fills in the spectrum
                                to create a complete and usable palette for web
                                project. We suggests using the 500 colors as the primary colors
                                in your project and the other colors as accents colors.
                            </p>
                        </div>

                        <div class="kt-section__content">
                            <div class="row row-lg color-palette">
                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">red</h5>
                                    <ul class="list-group">
                                        <li class="bg-red-a400 grey-800 list-group-item">
                                            <span>a400</span> /
                                            <span>#d50000</span>
                                        </li>

                                        <li class="bg-red-a300 grey-800 list-group-item">
                                            <span>a300</span> /
                                            <span>#ff1744</span>
                                        </li>

                                        <li class="bg-red-a200 grey-800 list-group-item">
                                            <span>a200</span> /
                                            <span>#ff5252</span>
                                        </li>

                                        <li class="bg-red-a100 grey-800 list-group-item">
                                            <span>a100</span> /
                                            <span>#ff8a80</span>
                                        </li>

                                        <li class="bg-red-900 list-group-item">
                                            <span>900</span> /
                                            <span>#b71c1c</span>
                                        </li>

                                        <li class="bg-red-800 list-group-item">
                                            <span>800</span> /
                                            <span>#c62828</span>
                                        </li>

                                        <li class="bg-red-700 list-group-item">
                                            <span>700</span> /
                                            <span>#d32f2f</span>
                                        </li>

                                        <li class="bg-red-600 list-group-item">
                                            <span>600</span> /
                                            <span>#e53935</span>
                                        </li>

                                        <li class="bg-red-500 list-group-item">
                                            <span>500</span> /
                                            <span>#f44336</span>
                                        </li>

                                        <li class="bg-red-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#ef5350</span>
                                        </li>

                                        <li class="bg-red-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#e57373</span>
                                        </li>

                                        <li class="bg-red-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#ef9a9a</span>
                                        </li>

                                        <li class="bg-red-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#ffcdd2</span>
                                        </li>

                                        <li class="bg-red-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#ffebee</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">pink</h5>
                                    <ul class="list-group">
                                        <li class="bg-pink-a400 grey-800 list-group-item">
                                            <span>a400</span> /
                                            <span>#c51162</span>
                                        </li>

                                        <li class="bg-pink-a300 grey-800 list-group-item">
                                            <span>a300</span> /
                                            <span>#f50057</span>
                                        </li>

                                        <li class="bg-pink-a200 grey-800 list-group-item">
                                            <span>a200</span> /
                                            <span>#ff4081</span>
                                        </li>

                                        <li class="bg-pink-a100 grey-800 list-group-item">
                                            <span>a100</span> /
                                            <span>#ff80ab</span>
                                        </li>

                                        <li class="bg-pink-900 list-group-item">
                                            <span>900</span> /
                                            <span>#880e4f</span>
                                        </li>

                                        <li class="bg-pink-800 list-group-item">
                                            <span>800</span> /
                                            <span>#ad1457</span>
                                        </li>

                                        <li class="bg-pink-700 list-group-item">
                                            <span>700</span> /
                                            <span>#c2185b</span>
                                        </li>

                                        <li class="bg-pink-600 list-group-item">
                                            <span>600</span> /
                                            <span>#d81b60</span>
                                        </li>

                                        <li class="bg-pink-500 list-group-item">
                                            <span>500</span> /
                                            <span>#e91e63</span>
                                        </li>

                                        <li class="bg-pink-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#ec407a</span>
                                        </li>

                                        <li class="bg-pink-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#f06292</span>
                                        </li>

                                        <li class="bg-pink-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#f48fb1</span>
                                        </li>

                                        <li class="bg-pink-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#f8bbd0</span>
                                        </li>

                                        <li class="bg-pink-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#fce4ec</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">purple</h5>
                                    <ul class="list-group">
                                        <li class="bg-purple-a400 grey-800 list-group-item">
                                            <span>a400</span> /
                                            <span>#aa00ff</span>
                                        </li>

                                        <li class="bg-purple-a300 grey-800 list-group-item">
                                            <span>a300</span> /
                                            <span>#d500f9</span>
                                        </li>

                                        <li class="bg-purple-a200 grey-800 list-group-item">
                                            <span>a200</span> /
                                            <span>#e040fb</span>
                                        </li>

                                        <li class="bg-purple-a100 grey-800 list-group-item">
                                            <span>a100</span> /
                                            <span>#ea80fc</span>
                                        </li>

                                        <li class="bg-purple-900 list-group-item">
                                            <span>900</span> /
                                            <span>#4a148c</span>
                                        </li>

                                        <li class="bg-purple-800 list-group-item">
                                            <span>800</span> /
                                            <span>#6a1b9a</span>
                                        </li>

                                        <li class="bg-purple-700 list-group-item">
                                            <span>700</span> /
                                            <span>#7b1fa2</span>
                                        </li>

                                        <li class="bg-purple-600 list-group-item">
                                            <span>600</span> /
                                            <span>#8e24aa</span>
                                        </li>

                                        <li class="bg-purple-500 list-group-item">
                                            <span>500</span> /
                                            <span>#9c27b0</span>
                                        </li>

                                        <li class="bg-purple-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#ab47bc</span>
                                        </li>

                                        <li class="bg-purple-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#ba68c8</span>
                                        </li>

                                        <li class="bg-purple-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#ce93d8</span>
                                        </li>

                                        <li class="bg-purple-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#e1bee7</span>
                                        </li>

                                        <li class="bg-purple-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#f3e5f5</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">deep-purple</h5>
                                    <ul class="list-group">
                                        <li class="bg-deep-purple-a400 grey-800 list-group-item">
                                            <span>a400</span> /
                                            <span>#6200ea</span>
                                        </li>

                                        <li class="bg-deep-purple-a300 grey-800 list-group-item">
                                            <span>a300</span> /
                                            <span>#651fff</span>
                                        </li>

                                        <li class="bg-deep-purple-a200 grey-800 list-group-item">
                                            <span>a200</span> /
                                            <span>#7c4dff</span>
                                        </li>

                                        <li class="bg-deep-purple-a100 grey-800 list-group-item">
                                            <span>a100</span> /
                                            <span>#b388ff</span>
                                        </li>

                                        <li class="bg-deep-purple-900 list-group-item">
                                            <span>900</span> /
                                            <span>#311b92</span>
                                        </li>

                                        <li class="bg-deep-purple-800 list-group-item">
                                            <span>800</span> /
                                            <span>#4527a0</span>
                                        </li>

                                        <li class="bg-deep-purple-700 list-group-item">
                                            <span>700</span> /
                                            <span>#512da8</span>
                                        </li>

                                        <li class="bg-deep-purple-600 list-group-item">
                                            <span>600</span> /
                                            <span>#5e35b1</span>
                                        </li>

                                        <li class="bg-deep-purple-500 list-group-item">
                                            <span>500</span> /
                                            <span>#673ab7</span>
                                        </li>

                                        <li class="bg-deep-purple-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#7e57c2</span>
                                        </li>

                                        <li class="bg-deep-purple-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#9575cd</span>
                                        </li>

                                        <li class="bg-deep-purple-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#b39ddb</span>
                                        </li>

                                        <li class="bg-deep-purple-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#d1c4e9</span>
                                        </li>

                                        <li class="bg-deep-purple-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#ede7f6</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">indigo</h5>
                                    <ul class="list-group">
                                        <li class="bg-indigo-a400 grey-800 list-group-item">
                                            <span>a400</span> /
                                            <span>#304ffe</span>
                                        </li>

                                        <li class="bg-indigo-a300 grey-800 list-group-item">
                                            <span>a300</span> /
                                            <span>#3d5afe</span>
                                        </li>

                                        <li class="bg-indigo-a200 grey-800 list-group-item">
                                            <span>a200</span> /
                                            <span>#536dfe</span>
                                        </li>

                                        <li class="bg-indigo-a100 grey-800 list-group-item">
                                            <span>a100</span> /
                                            <span>#8c9eff</span>
                                        </li>

                                        <li class="bg-indigo-900 list-group-item">
                                            <span>900</span> /
                                            <span>#1a237e</span>
                                        </li>

                                        <li class="bg-indigo-800 list-group-item">
                                            <span>800</span> /
                                            <span>#283593</span>
                                        </li>

                                        <li class="bg-indigo-700 list-group-item">
                                            <span>700</span> /
                                            <span>#303f9f</span>
                                        </li>

                                        <li class="bg-indigo-600 list-group-item">
                                            <span>600</span> /
                                            <span>#3949ab</span>
                                        </li>

                                        <li class="bg-indigo-500 list-group-item">
                                            <span>500</span> /
                                            <span>#3f51b5</span>
                                        </li>

                                        <li class="bg-indigo-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#5c6bc0</span>
                                        </li>

                                        <li class="bg-indigo-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#7986cb</span>
                                        </li>

                                        <li class="bg-indigo-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#9fa8da</span>
                                        </li>

                                        <li class="bg-indigo-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#c5cae9</span>
                                        </li>

                                        <li class="bg-indigo-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#e8eaf6</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">blue</h5>
                                    <ul class="list-group">
                                        <li class="bg-blue-a400 grey-800 list-group-item">
                                            <span>a400</span> /
                                            <span>#2962ff</span>
                                        </li>

                                        <li class="bg-blue-a300 grey-800 list-group-item">
                                            <span>a300</span> /
                                            <span>#2979ff</span>
                                        </li>

                                        <li class="bg-blue-a200 grey-800 list-group-item">
                                            <span>a200</span> /
                                            <span>#448aff</span>
                                        </li>

                                        <li class="bg-blue-a100 grey-800 list-group-item">
                                            <span>a100</span> /
                                            <span>#82b1ff</span>
                                        </li>

                                        <li class="bg-blue-900 list-group-item">
                                            <span>900</span> /
                                            <span>#0d47a1</span>
                                        </li>

                                        <li class="bg-blue-800 list-group-item">
                                            <span>800</span> /
                                            <span>#1565c0</span>
                                        </li>

                                        <li class="bg-blue-700 list-group-item">
                                            <span>700</span> /
                                            <span>#1976d2</span>
                                        </li>

                                        <li class="bg-blue-600 list-group-item">
                                            <span>600</span> /
                                            <span>#1e88e5</span>
                                        </li>

                                        <li class="bg-blue-500 list-group-item">
                                            <span>500</span> /
                                            <span>#2196f3</span>
                                        </li>

                                        <li class="bg-blue-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#42a5f5</span>
                                        </li>

                                        <li class="bg-blue-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#64b5f6</span>
                                        </li>

                                        <li class="bg-blue-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#90caf9</span>
                                        </li>

                                        <li class="bg-blue-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#bbdefb</span>
                                        </li>

                                        <li class="bg-blue-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#e3f2fd</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">light-blue</h5>
                                    <ul class="list-group">
                                        <li class="bg-light-blue-a400 grey-800 list-group-item">
                                            <span>a400</span> /
                                            <span>#0091ea</span>
                                        </li>

                                        <li class="bg-light-blue-a300 grey-800 list-group-item">
                                            <span>a300</span> /
                                            <span>#00b0ff</span>
                                        </li>

                                        <li class="bg-light-blue-a200 grey-800 list-group-item">
                                            <span>a200</span> /
                                            <span>#40c4ff</span>
                                        </li>

                                        <li class="bg-light-blue-a100 grey-800 list-group-item">
                                            <span>a100</span> /
                                            <span>#80d8ff</span>
                                        </li>

                                        <li class="bg-light-blue-900 list-group-item">
                                            <span>900</span> /
                                            <span>#01579b</span>
                                        </li>

                                        <li class="bg-light-blue-800 list-group-item">
                                            <span>800</span> /
                                            <span>#0277bd</span>
                                        </li>

                                        <li class="bg-light-blue-700 list-group-item">
                                            <span>700</span> /
                                            <span>#0288d1</span>
                                        </li>

                                        <li class="bg-light-blue-600 list-group-item">
                                            <span>600</span> /
                                            <span>#039be5</span>
                                        </li>

                                        <li class="bg-light-blue-500 list-group-item">
                                            <span>500</span> /
                                            <span>#03a9f4</span>
                                        </li>

                                        <li class="bg-light-blue-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#29b6f6</span>
                                        </li>

                                        <li class="bg-light-blue-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#4fc3f7</span>
                                        </li>

                                        <li class="bg-light-blue-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#81d4fa</span>
                                        </li>

                                        <li class="bg-light-blue-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#b3e5fc</span>
                                        </li>

                                        <li class="bg-light-blue-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#e1f5fe</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">cyan</h5>
                                    <ul class="list-group">
                                        <li class="bg-cyan-a400 grey-800 list-group-item">
                                            <span>a400</span> /
                                            <span>#00b8d4</span>
                                        </li>

                                        <li class="bg-cyan-a300 grey-800 list-group-item">
                                            <span>a300</span> /
                                            <span>#00e5ff</span>
                                        </li>

                                        <li class="bg-cyan-a200 grey-800 list-group-item">
                                            <span>a200</span> /
                                            <span>#18ffff</span>
                                        </li>

                                        <li class="bg-cyan-a100 grey-800 list-group-item">
                                            <span>a100</span> /
                                            <span>#84ffff</span>
                                        </li>

                                        <li class="bg-cyan-900 list-group-item">
                                            <span>900</span> /
                                            <span>#006064</span>
                                        </li>

                                        <li class="bg-cyan-800 list-group-item">
                                            <span>800</span> /
                                            <span>#00838f</span>
                                        </li>

                                        <li class="bg-cyan-700 list-group-item">
                                            <span>700</span> /
                                            <span>#0097a7</span>
                                        </li>

                                        <li class="bg-cyan-600 list-group-item">
                                            <span>600</span> /
                                            <span>#00acc1</span>
                                        </li>

                                        <li class="bg-cyan-500 list-group-item">
                                            <span>500</span> /
                                            <span>#00bcd4</span>
                                        </li>

                                        <li class="bg-cyan-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#26c6da</span>
                                        </li>

                                        <li class="bg-cyan-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#4dd0e1</span>
                                        </li>

                                        <li class="bg-cyan-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#80deea</span>
                                        </li>

                                        <li class="bg-cyan-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#b2ebf2</span>
                                        </li>

                                        <li class="bg-cyan-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#e0f7fa</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">teal</h5>
                                    <ul class="list-group">
                                        <li class="bg-teal-a400 grey-800 list-group-item">
                                            <span>a400</span> /
                                            <span>#00bfa5</span>
                                        </li>

                                        <li class="bg-teal-a300 grey-800 list-group-item">
                                            <span>a300</span> /
                                            <span>#1de9b6</span>
                                        </li>

                                        <li class="bg-teal-a200 grey-800 list-group-item">
                                            <span>a200</span> /
                                            <span>#64ffda</span>
                                        </li>

                                        <li class="bg-teal-a100 grey-800 list-group-item">
                                            <span>a100</span> /
                                            <span>#a7ffeb</span>
                                        </li>

                                        <li class="bg-teal-900 list-group-item">
                                            <span>900</span> /
                                            <span>#004d40</span>
                                        </li>

                                        <li class="bg-teal-800 list-group-item">
                                            <span>800</span> /
                                            <span>#00695c</span>
                                        </li>

                                        <li class="bg-teal-700 list-group-item">
                                            <span>700</span> /
                                            <span>#00796b</span>
                                        </li>

                                        <li class="bg-teal-600 list-group-item">
                                            <span>600</span> /
                                            <span>#00897b</span>
                                        </li>

                                        <li class="bg-teal-500 list-group-item">
                                            <span>500</span> /
                                            <span>#009688</span>
                                        </li>

                                        <li class="bg-teal-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#26a69a</span>
                                        </li>

                                        <li class="bg-teal-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#4db6ac</span>
                                        </li>

                                        <li class="bg-teal-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#80cbc4</span>
                                        </li>

                                        <li class="bg-teal-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#b2dfdb</span>
                                        </li>

                                        <li class="bg-teal-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#e0f2f1</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">green</h5>
                                    <ul class="list-group">
                                        <li class="bg-green-a400 grey-800 list-group-item">
                                            <span>a400</span> /
                                            <span>#00c853</span>
                                        </li>

                                        <li class="bg-green-a300 grey-800 list-group-item">
                                            <span>a300</span> /
                                            <span>#00e676</span>
                                        </li>

                                        <li class="bg-green-a200 grey-800 list-group-item">
                                            <span>a200</span> /
                                            <span>#69f0ae</span>
                                        </li>

                                        <li class="bg-green-a100 grey-800 list-group-item">
                                            <span>a100</span> /
                                            <span>#b9f6ca</span>
                                        </li>

                                        <li class="bg-green-900 list-group-item">
                                            <span>900</span> /
                                            <span>#1b5e20</span>
                                        </li>

                                        <li class="bg-green-800 list-group-item">
                                            <span>800</span> /
                                            <span>#2e7d32</span>
                                        </li>

                                        <li class="bg-green-700 list-group-item">
                                            <span>700</span> /
                                            <span>#388e3c</span>
                                        </li>

                                        <li class="bg-green-600 list-group-item">
                                            <span>600</span> /
                                            <span>#43a047</span>
                                        </li>

                                        <li class="bg-green-500 list-group-item">
                                            <span>500</span> /
                                            <span>#4caf50</span>
                                        </li>

                                        <li class="bg-green-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#66bb6a</span>
                                        </li>

                                        <li class="bg-green-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#81c784</span>
                                        </li>

                                        <li class="bg-green-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#a5d6a7</span>
                                        </li>

                                        <li class="bg-green-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#c8e6c9</span>
                                        </li>

                                        <li class="bg-green-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#e8f5e9</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">light-green</h5>
                                    <ul class="list-group">
                                        <li class="bg-light-green-a400 grey-800 list-group-item">
                                            <span>a400</span> /
                                            <span>#64dd17</span>
                                        </li>

                                        <li class="bg-light-green-a300 grey-800 list-group-item">
                                            <span>a300</span> /
                                            <span>#76ff03</span>
                                        </li>

                                        <li class="bg-light-green-a200 grey-800 list-group-item">
                                            <span>a200</span> /
                                            <span>#b2ff59</span>
                                        </li>

                                        <li class="bg-light-green-a100 grey-800 list-group-item">
                                            <span>a100</span> /
                                            <span>#ccff90</span>
                                        </li>

                                        <li class="bg-light-green-900 list-group-item">
                                            <span>900</span> /
                                            <span>#33691e</span>
                                        </li>

                                        <li class="bg-light-green-800 list-group-item">
                                            <span>800</span> /
                                            <span>#558b2f</span>
                                        </li>

                                        <li class="bg-light-green-700 list-group-item">
                                            <span>700</span> /
                                            <span>#689f38</span>
                                        </li>

                                        <li class="bg-light-green-600 list-group-item">
                                            <span>600</span> /
                                            <span>#7cb342</span>
                                        </li>

                                        <li class="bg-light-green-500 list-group-item">
                                            <span>500</span> /
                                            <span>#8bc34a</span>
                                        </li>

                                        <li class="bg-light-green-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#9ccc65</span>
                                        </li>

                                        <li class="bg-light-green-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#aed581</span>
                                        </li>

                                        <li class="bg-light-green-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#c5e1a5</span>
                                        </li>

                                        <li class="bg-light-green-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#dcedc8</span>
                                        </li>

                                        <li class="bg-light-green-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#f1f8e9</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">lime</h5>
                                    <ul class="list-group">
                                        <li class="bg-lime-a400 grey-800 list-group-item">
                                            <span>a400</span> /
                                            <span>#aeea00</span>
                                        </li>

                                        <li class="bg-lime-a300 grey-800 list-group-item">
                                            <span>a300</span> /
                                            <span>#c6ff00</span>
                                        </li>

                                        <li class="bg-lime-a200 grey-800 list-group-item">
                                            <span>a200</span> /
                                            <span>#eeff41</span>
                                        </li>

                                        <li class="bg-lime-a100 grey-800 list-group-item">
                                            <span>a100</span> /
                                            <span>#f4ff81</span>
                                        </li>

                                        <li class="bg-lime-900 list-group-item">
                                            <span>900</span> /
                                            <span>#827717</span>
                                        </li>

                                        <li class="bg-lime-800 list-group-item">
                                            <span>800</span> /
                                            <span>#9e9d24</span>
                                        </li>

                                        <li class="bg-lime-700 list-group-item">
                                            <span>700</span> /
                                            <span>#afb42b</span>
                                        </li>

                                        <li class="bg-lime-600 list-group-item">
                                            <span>600</span> /
                                            <span>#c0ca33</span>
                                        </li>

                                        <li class="bg-lime-500 list-group-item">
                                            <span>500</span> /
                                            <span>#cddc39</span>
                                        </li>

                                        <li class="bg-lime-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#d4e157</span>
                                        </li>

                                        <li class="bg-lime-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#dce775</span>
                                        </li>

                                        <li class="bg-lime-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#e6ee9c</span>
                                        </li>

                                        <li class="bg-lime-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#f0f4c3</span>
                                        </li>

                                        <li class="bg-lime-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#f9fbe7</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">yellow</h5>
                                    <ul class="list-group">
                                        <li class="bg-yellow-a400 grey-800 list-group-item">
                                            <span>a400</span> /
                                            <span>#ffd600</span>
                                        </li>

                                        <li class="bg-yellow-a300 grey-800 list-group-item">
                                            <span>a300</span> /
                                            <span>#ffea00</span>
                                        </li>

                                        <li class="bg-yellow-a200 grey-800 list-group-item">
                                            <span>a200</span> /
                                            <span>#ffff00</span>
                                        </li>

                                        <li class="bg-yellow-a100 grey-800 list-group-item">
                                            <span>a100</span> /
                                            <span>#ffff8d</span>
                                        </li>

                                        <li class="bg-yellow-900 list-group-item">
                                            <span>900</span> /
                                            <span>#f57f17</span>
                                        </li>

                                        <li class="bg-yellow-800 list-group-item">
                                            <span>800</span> /
                                            <span>#f9a825</span>
                                        </li>

                                        <li class="bg-yellow-700 list-group-item">
                                            <span>700</span> /
                                            <span>#fbc02d</span>
                                        </li>

                                        <li class="bg-yellow-600 list-group-item">
                                            <span>600</span> /
                                            <span>#fdd835</span>
                                        </li>

                                        <li class="bg-yellow-500 list-group-item">
                                            <span>500</span> /
                                            <span>#ffeb3b</span>
                                        </li>

                                        <li class="bg-yellow-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#ffee58</span>
                                        </li>

                                        <li class="bg-yellow-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#fff176</span>
                                        </li>

                                        <li class="bg-yellow-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#fff59d</span>
                                        </li>

                                        <li class="bg-yellow-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#fff9c4</span>
                                        </li>

                                        <li class="bg-yellow-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#fffde7</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">amber</h5>
                                    <ul class="list-group">
                                        <li class="bg-amber-a400 grey-800 list-group-item">
                                            <span>a400</span> /
                                            <span>#ffab00</span>
                                        </li>

                                        <li class="bg-amber-a300 grey-800 list-group-item">
                                            <span>a300</span> /
                                            <span>#ffc400</span>
                                        </li>

                                        <li class="bg-amber-a200 grey-800 list-group-item">
                                            <span>a200</span> /
                                            <span>#ffd740</span>
                                        </li>

                                        <li class="bg-amber-a100 grey-800 list-group-item">
                                            <span>a100</span> /
                                            <span>#ffe57f</span>
                                        </li>

                                        <li class="bg-amber-900 list-group-item">
                                            <span>900</span> /
                                            <span>#ff6f00</span>
                                        </li>

                                        <li class="bg-amber-800 list-group-item">
                                            <span>800</span> /
                                            <span>#ff8f00</span>
                                        </li>

                                        <li class="bg-amber-700 list-group-item">
                                            <span>700</span> /
                                            <span>#ffa000</span>
                                        </li>

                                        <li class="bg-amber-600 list-group-item">
                                            <span>600</span> /
                                            <span>#ffb300</span>
                                        </li>

                                        <li class="bg-amber-500 list-group-item">
                                            <span>500</span> /
                                            <span>#ffc107</span>
                                        </li>

                                        <li class="bg-amber-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#ffca28</span>
                                        </li>

                                        <li class="bg-amber-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#ffd54f</span>
                                        </li>

                                        <li class="bg-amber-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#ffe082</span>
                                        </li>

                                        <li class="bg-amber-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#ffecb3</span>
                                        </li>

                                        <li class="bg-amber-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#fff8e1</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">orange</h5>
                                    <ul class="list-group">
                                        <li class="bg-orange-a400 grey-800 list-group-item">
                                            <span>a400</span> /
                                            <span>#ff6d00</span>
                                        </li>

                                        <li class="bg-orange-a300 grey-800 list-group-item">
                                            <span>a300</span> /
                                            <span>#ff9100</span>
                                        </li>

                                        <li class="bg-orange-a200 grey-800 list-group-item">
                                            <span>a200</span> /
                                            <span>#ffab40</span>
                                        </li>

                                        <li class="bg-orange-a100 grey-800 list-group-item">
                                            <span>a100</span> /
                                            <span>#ffd180</span>
                                        </li>

                                        <li class="bg-orange-900 list-group-item">
                                            <span>900</span> /
                                            <span>#e65100</span>
                                        </li>

                                        <li class="bg-orange-800 list-group-item">
                                            <span>800</span> /
                                            <span>#ef6c00</span>
                                        </li>

                                        <li class="bg-orange-700 list-group-item">
                                            <span>700</span> /
                                            <span>#f57c00</span>
                                        </li>

                                        <li class="bg-orange-600 list-group-item">
                                            <span>600</span> /
                                            <span>#fb8c00</span>
                                        </li>

                                        <li class="bg-orange-500 list-group-item">
                                            <span>500</span> /
                                            <span>#ff9800</span>
                                        </li>

                                        <li class="bg-orange-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#ffa726</span>
                                        </li>

                                        <li class="bg-orange-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#ffb74d</span>
                                        </li>

                                        <li class="bg-orange-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#ffcc80</span>
                                        </li>

                                        <li class="bg-orange-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#ffe0b2</span>
                                        </li>

                                        <li class="bg-orange-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#fff3e0</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">deep-orange</h5>
                                    <ul class="list-group">
                                        <li class="bg-deep-orange-a400 grey-800 list-group-item">
                                            <span>a400</span> /
                                            <span>#dd2c00</span>
                                        </li>

                                        <li class="bg-deep-orange-a300 grey-800 list-group-item">
                                            <span>a300</span> /
                                            <span>#ff3d00</span>
                                        </li>

                                        <li class="bg-deep-orange-a200 grey-800 list-group-item">
                                            <span>a200</span> /
                                            <span>#ff6e40</span>
                                        </li>

                                        <li class="bg-deep-orange-a100 grey-800 list-group-item">
                                            <span>a100</span> /
                                            <span>#ff9e80</span>
                                        </li>

                                        <li class="bg-deep-orange-900 list-group-item">
                                            <span>900</span> /
                                            <span>#bf360c</span>
                                        </li>

                                        <li class="bg-deep-orange-800 list-group-item">
                                            <span>800</span> /
                                            <span>#d84315</span>
                                        </li>

                                        <li class="bg-deep-orange-700 list-group-item">
                                            <span>700</span> /
                                            <span>#e64a19</span>
                                        </li>

                                        <li class="bg-deep-orange-600 list-group-item">
                                            <span>600</span> /
                                            <span>#f4511e</span>
                                        </li>

                                        <li class="bg-deep-orange-500 list-group-item">
                                            <span>500</span> /
                                            <span>#ff5722</span>
                                        </li>

                                        <li class="bg-deep-orange-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#ff7043</span>
                                        </li>

                                        <li class="bg-deep-orange-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#ff8a65</span>
                                        </li>

                                        <li class="bg-deep-orange-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#ffab91</span>
                                        </li>

                                        <li class="bg-deep-orange-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#ffccbc</span>
                                        </li>

                                        <li class="bg-deep-orange-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#fbe9e7</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">brown</h5>
                                    <ul class="list-group">
                                        <li class="bg-brown-900 list-group-item">
                                            <span>900</span> /
                                            <span>#3e2723</span>
                                        </li>

                                        <li class="bg-brown-800 list-group-item">
                                            <span>800</span> /
                                            <span>#4e342e</span>
                                        </li>

                                        <li class="bg-brown-700 list-group-item">
                                            <span>700</span> /
                                            <span>#5d4037</span>
                                        </li>

                                        <li class="bg-brown-600 list-group-item">
                                            <span>600</span> /
                                            <span>#6d4c41</span>
                                        </li>

                                        <li class="bg-brown-500 list-group-item">
                                            <span>500</span> /
                                            <span>#795548</span>
                                        </li>

                                        <li class="bg-brown-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#8d6e63</span>
                                        </li>

                                        <li class="bg-brown-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#a1887f</span>
                                        </li>

                                        <li class="bg-brown-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#bcaaa4</span>
                                        </li>

                                        <li class="bg-brown-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#d7ccc8</span>
                                        </li>

                                        <li class="bg-brown-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#efebe9</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">grey</h5>
                                    <ul class="list-group">
                                        <li class="bg-grey-900 list-group-item">
                                            <span>900</span> /
                                            <span>#212121</span>
                                        </li>

                                        <li class="bg-grey-800 list-group-item">
                                            <span>800</span> /
                                            <span>#424242</span>
                                        </li>

                                        <li class="bg-grey-700 list-group-item">
                                            <span>700</span> /
                                            <span>#616161</span>
                                        </li>

                                        <li class="bg-grey-600 list-group-item">
                                            <span>600</span> /
                                            <span>#757575</span>
                                        </li>

                                        <li class="bg-grey-500 list-group-item">
                                            <span>500</span> /
                                            <span>#9e9e9e</span>
                                        </li>

                                        <li class="bg-grey-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#bdbdbd</span>
                                        </li>

                                        <li class="bg-grey-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#e0e0e0</span>
                                        </li>

                                        <li class="bg-grey-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#eeeeee</span>
                                        </li>

                                        <li class="bg-grey-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#f5f5f5</span>
                                        </li>

                                        <li class="bg-grey-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#fafafa</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <h5 class="text-uppercase">blue-grey</h5>
                                    <ul class="list-group">
                                        <li class="bg-blue-grey-900 list-group-item">
                                            <span>900</span> /
                                            <span>#263238</span>
                                        </li>

                                        <li class="bg-blue-grey-800 list-group-item">
                                            <span>800</span> /
                                            <span>#37474f</span>
                                        </li>

                                        <li class="bg-blue-grey-700 list-group-item">
                                            <span>700</span> /
                                            <span>#455a64</span>
                                        </li>

                                        <li class="bg-blue-grey-600 list-group-item">
                                            <span>600</span> /
                                            <span>#546e7a</span>
                                        </li>

                                        <li class="bg-blue-grey-500 list-group-item">
                                            <span>500</span> /
                                            <span>#607d8b</span>
                                        </li>

                                        <li class="bg-blue-grey-400 grey-800 list-group-item">
                                            <span>400</span> /
                                            <span>#78909c</span>
                                        </li>

                                        <li class="bg-blue-grey-300 grey-800 list-group-item">
                                            <span>300</span> /
                                            <span>#90a4ae</span>
                                        </li>

                                        <li class="bg-blue-grey-200 grey-800 list-group-item">
                                            <span>200</span> /
                                            <span>#b0bec5</span>
                                        </li>

                                        <li class="bg-blue-grey-100 grey-800 list-group-item">
                                            <span>100</span> /
                                            <span>#cfd8dc</span>
                                        </li>

                                        <li class="bg-blue-grey-50 grey-800 list-group-item">
                                            <span>50</span> /
                                            <span>#eceff1</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon kt-hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Color Application
                        </h3>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <div class="kt-section">
                        <div class="kt-section__content">
                            <div class="row">
                                <div class="col-xl-6">
                                    <h3>Color Application</h3>

                                    <p class="text-justify">Limit your selection of colors by choosing three color hues
                                        from the primary palette and one accent color from the secondary
                                        palette. The accent may or may not need fallback options.
                                    </p>
                                    <!-- Example Choose Your Palette -->
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="example-wrap">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>Active color</p>
                                                        <span>#3949ab</span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="bg-indigo-600 color-box">600</div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>Base color</p>
                                                        <span>#3f51b5</span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="bg-indigo-500 color-box">500</div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>Hover color</p>
                                                        <span>#5c6bc0</span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="bg-indigo-400 color-box">400</div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>Background opt.</p>
                                                        <span>#c5cae9</span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="bg-indigo-100 color-box grey-700">100</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="example-wrap">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>Active color</p>
                                                        <span>#e53935</span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="bg-red-600 color-box">600</div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>Base color</p>
                                                        <span>#f44336</span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="bg-red-500 color-box">500</div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>Hover color</p>
                                                        <span>#ef5350</span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="bg-red-400 color-box">400</div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>Background opt.</p>
                                                        <span>#ffcdd2</span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="bg-red-100 color-box grey-700">100</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Example Choose Your Palette -->
                                </div>

                                <div class="col-xl-6">
                                    <!-- Example Text Color -->
                                    <div class="example-wrap">
                                        <h4 class="example-title">Text Color</h4>
                                        <p class="text-justify">
                                            To convey a hierarchy of information, you can use different
                                            shades for text. The standard content text color is #79838B.
                                        </p>

                                        <div class="row mb-20">
                                            <div class="col-md-3">
                                                <div class="example">
                                                    <div class="bg-grey-800 text-color-box"></div>
                                                    <p>Title color</p>
                                                    <span>#424242</span>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="example">
                                                    <div class="bg-grey-700 text-color-box"></div>
                                                    <p>Subtitle color</p>
                                                    <span>#616161</span>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="example">
                                                    <div class="bg-grey-600 text-color-box"></div>
                                                    <p>Text color</p>
                                                    <span>#757575</span>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="example">
                                                    <div class="bg-grey-500 text-color-box"></div>
                                                    <p>Prompt color</p>
                                                    <span>#9e9e9e</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Example Text Color -->
                                </div>
                                <div class="col-xl-6">
                                    <!-- Example Use Alpha -->
                                    <div class="example-wrap m-lg-0">
                                        <h4 class="example-title">Use Alpha For Icons, And Dividers</h4>
                                        <p class="text-justify">
                                            Icons and dividers, also benefit from having an alpha value
                                            of black instead of a solid color, to make sure the color
                                            below.
                                        </p>

                                        <div class="row">
                                            <div class="col-xl-6 mb-10">
                                                <div class="example">
                                                    <div class="bg-grey-800 example-alpha">Grey Darkest</div>
                                                    <div class="row opacity-example">
                                                        <div class="col-md-6">
                                                            <p>
                                                                <span>Normal:</span>
                                                                <span class="opacity-four"><i class="icon md-image" aria-hidden="true"></i>40%</span>
                                                            </p>

                                                            <p>
                                                                <span>Hover:</span>
                                                                <span class="opacity-six"><i class="icon md-image" aria-hidden="true"></i>60%</span>
                                                            </p>

                                                            <p>
                                                                <span>Active:</span>
                                                                <span class="grey-800"><i class="icon md-image" aria-hidden="true"></i>100%</span>
                                                            </p>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <p>
                                                                <span>Normal:</span>
                                                                <span class="opacity-six"><i class="icon md-image" aria-hidden="true"></i>60%</span>
                                                            </p>

                                                            <p>
                                                                <span>Hover:</span>
                                                                <span class="opacity-eight"><i class="icon md-image" aria-hidden="true"></i>80%</span>
                                                            </p>

                                                            <p>
                                                                <span>Active:</span>
                                                                <span class="grey-800"><i class="icon md-image" aria-hidden="true"></i>100%</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="example">
                                                    <div class="bg-grey-900 example-alpha">Gray Base</div>
                                                    <div class="example-alpha example-divider grey-600">Dividers 10%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Example Use Alpha -->
                                </div>
                                <div class="col-xl-6">
                                    <!-- Example Border Color -->
                                    <div class="example-wrap">
                                        <h4 class="example-title">Border Color</h4>
                                        <p class="text-justify">
                                            Border color should use the primary #E6E8EA color, which should
                                            be the main color of your project.
                                        </p>

                                        <div class="example-border">
                                            <div class="bg-grey-300"></div>
                                            <div>
                                                <p>Border color</p>
                                                <span>#e0e0e0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Example Border Color -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
@endsection
