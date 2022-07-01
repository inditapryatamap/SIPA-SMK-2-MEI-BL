<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
   id="kt_aside">
   <!-- begin:: Aside -->
   <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
      <div class="kt-aside__brand-logo">
         <a href="#">
         <img alt="Logo" style="width: 50%;" src="{{ url('assets') }}/media/logos/logo-dark-sipa.png" />
         </a>
      </div>
      <div class="kt-aside__brand-tools">
         <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
            <span>
               <i style="color: white" class="flaticon2-back-1"></i>
            </span>
            <span>
               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                  width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                     <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                     <path
                        d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                        id="Path-94" fill="#000000" fill-rule="nonzero" />
                     <path
                        d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                        id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3"
                        transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                  </g>
               </svg>
            </span>
         </button>
         <!--
            <button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
            -->
      </div>
   </div>
   <!-- end:: Aside -->
   <!-- begin:: Aside Menu -->
   <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
      <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
         data-ktmenu-dropdown-timeout="500">
         <ul class="kt-menu__nav ">
            <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
               <a
                  href="{{ route('siswa.dashboard') }}" class="kt-menu__link ">
                  <span class="kt-menu__link-icon">
                     <svg
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                        viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <polygon id="Bound" points="0 0 24 0 24 24 0 24" />
                           <path
                              d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                              id="Shape" fill="#000000" fill-rule="nonzero" />
                           <path
                              d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                              id="Path" fill="#000000" opacity="0.3" />
                        </g>
                     </svg>
                  </span>
                  <span class="kt-menu__link-text">Dashboard</span>
               </a>
            </li>
            <li class="kt-menu__section ">
               <h4 class="kt-menu__section-text">Custom</h4>
               <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            {{-- <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
               data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;"
                  class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                     <svg
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                        viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect id="bound" x="0" y="0" width="24" height="24" />
                           <rect id="Rectangle-7" fill="#000000" x="4" y="4" width="7" height="7"
                              rx="1.5" />
                           <path
                              d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                              id="Combined-Shape" fill="#000000" opacity="0.3" />
                        </g>
                     </svg>
                  </span>
                  <span class="kt-menu__link-text">Applications</span><i
                     class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
                        class="kt-menu__link"><span
                        class="kt-menu__link-text">Applications</span></span></li>
                     <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
                        data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;"
                           class="kt-menu__link kt-menu__toggle"><i
                           class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span
                           class="kt-menu__link-text">Users</span><i
                           class="kt-menu__ver-arrow la la-angle-right"></i></a>
                        <div class="kt-menu__submenu ">
                           <span class="kt-menu__arrow"></span>
                           <ul class="kt-menu__subnav">
                              <li class="kt-menu__item " aria-haspopup="true"><a
                                 href="demo1/custom/apps/user/list-default.html"
                                 class="kt-menu__link "><i
                                 class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                 class="kt-menu__link-text">List - Default</span></a>
                              </li>
                              <li class="kt-menu__item " aria-haspopup="true"><a
                                 href="demo1/custom/apps/user/list-datatable.html"
                                 class="kt-menu__link "><i
                                 class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                 class="kt-menu__link-text">List - Datatable</span></a>
                              </li>
                              <li class="kt-menu__item " aria-haspopup="true"><a
                                 href="demo1/custom/apps/user/list-columns-1.html"
                                 class="kt-menu__link "><i
                                 class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                 class="kt-menu__link-text">List - Columns - 1</span></a>
                              </li>
                              <li class="kt-menu__item " aria-haspopup="true"><a
                                 href="demo1/custom/apps/user/list-columns-2.html"
                                 class="kt-menu__link "><i
                                 class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                 class="kt-menu__link-text">List - Columns - 2</span></a>
                              </li>
                              <li class="kt-menu__item " aria-haspopup="true"><a
                                 href="demo1/custom/apps/user/add-user.html"
                                 class="kt-menu__link "><i
                                 class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                 class="kt-menu__link-text">Add User</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a
                                 href="demo1/custom/apps/user/edit-user.html"
                                 class="kt-menu__link "><i
                                 class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                 class="kt-menu__link-text">Edit User</span></a></li>
                              <li class="kt-menu__item  kt-menu__item--submenu"
                                 aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                 <a
                                    href="javascript:;" class="kt-menu__link kt-menu__toggle"><i
                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                    class="kt-menu__link-text">Profile 1</span><i
                                    class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                 <div class="kt-menu__submenu ">
                                    <span
                                       class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                       <li class="kt-menu__item " aria-haspopup="true"><a
                                          href="demo1/custom/apps/user/profile-1/overview.html"
                                          class="kt-menu__link "><i
                                          class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span
                                          class="kt-menu__link-text">Overview</span></a>
                                       </li>
                                       <li class="kt-menu__item " aria-haspopup="true"><a
                                          href="demo1/custom/apps/user/profile-1/personal-information.html"
                                          class="kt-menu__link "><i
                                          class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span
                                          class="kt-menu__link-text">Personal
                                          Information</span></a>
                                       </li>
                                       <li class="kt-menu__item " aria-haspopup="true"><a
                                          href="demo1/custom/apps/user/profile-1/account-information.html"
                                          class="kt-menu__link "><i
                                          class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span
                                          class="kt-menu__link-text">Account
                                          Information</span></a>
                                       </li>
                                       <li class="kt-menu__item " aria-haspopup="true"><a
                                          href="demo1/custom/apps/user/profile-1/change-password.html"
                                          class="kt-menu__link "><i
                                          class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span
                                          class="kt-menu__link-text">Change
                                          Password</span></a>
                                       </li>
                                       <li class="kt-menu__item " aria-haspopup="true"><a
                                          href="demo1/custom/apps/user/profile-1/email-settings.html"
                                          class="kt-menu__link "><i
                                          class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span
                                          class="kt-menu__link-text">Email
                                          Settings</span></a>
                                       </li>
                                    </ul>
                                 </div>
                              </li>
                              <li class="kt-menu__item " aria-haspopup="true"><a
                                 href="demo1/custom/apps/user/profile-2.html"
                                 class="kt-menu__link "><i
                                 class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                 class="kt-menu__link-text">Profile 2</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a
                                 href="demo1/custom/apps/user/profile-3.html"
                                 class="kt-menu__link "><i
                                 class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                 class="kt-menu__link-text">Profile 3</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a
                                 href="demo1/custom/apps/user/profile-4.html"
                                 class="kt-menu__link "><i
                                 class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                 class="kt-menu__link-text">Profile 4</span></a></li>
                           </ul>
                        </div>
                     </li>
                     <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
                        data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;"
                           class="kt-menu__link kt-menu__toggle"><i
                           class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span
                           class="kt-menu__link-text">Contacts</span><i
                           class="kt-menu__ver-arrow la la-angle-right"></i></a>
                        <div class="kt-menu__submenu ">
                           <span class="kt-menu__arrow"></span>
                           <ul class="kt-menu__subnav">
                              <li class="kt-menu__item " aria-haspopup="true"><a
                                 href="demo1/custom/apps/contacts/list-columns.html"
                                 class="kt-menu__link "><i
                                 class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                 class="kt-menu__link-text">List - Columns</span></a>
                              </li>
                              <li class="kt-menu__item " aria-haspopup="true"><a
                                 href="demo1/custom/apps/contacts/list-datatable.html"
                                 class="kt-menu__link "><i
                                 class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                 class="kt-menu__link-text">List - Datatable</span></a>
                              </li>
                              <li class="kt-menu__item " aria-haspopup="true"><a
                                 href="demo1/custom/apps/contacts/view-contact.html"
                                 class="kt-menu__link "><i
                                 class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                 class="kt-menu__link-text">View Contact</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a
                                 href="demo1/custom/apps/contacts/add-contact.html"
                                 class="kt-menu__link "><i
                                 class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                 class="kt-menu__link-text">Add Contact</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a
                                 href="demo1/custom/apps/contacts/edit-contact.html"
                                 class="kt-menu__link "><i
                                 class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                 class="kt-menu__link-text">Edit Contact</span></a></li>
                           </ul>
                        </div>
                     </li>
                     <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
                        data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;"
                           class="kt-menu__link kt-menu__toggle"><i
                           class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span
                           class="kt-menu__link-text">Chat</span><i
                           class="kt-menu__ver-arrow la la-angle-right"></i></a>
                        <div class="kt-menu__submenu ">
                           <span class="kt-menu__arrow"></span>
                           <ul class="kt-menu__subnav">
                              <li class="kt-menu__item " aria-haspopup="true"><a
                                 href="demo1/custom/apps/chat/private.html"
                                 class="kt-menu__link "><i
                                 class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                 class="kt-menu__link-text">Private</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a
                                 href="demo1/custom/apps/chat/group.html"
                                 class="kt-menu__link "><i
                                 class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                 class="kt-menu__link-text">Group</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a
                                 href="demo1/custom/apps/chat/popup.html"
                                 class="kt-menu__link "><i
                                 class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                 class="kt-menu__link-text">Popup</span></a></li>
                           </ul>
                        </div>
                     </li>
                  </ul>
               </div>
            </li> --}}
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
               data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;"
                  class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                     <svg
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                        viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect id="bound" x="0" y="0" width="24" height="24" />
                           <path
                              d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z"
                              id="Combined-Shape" fill="#000000" />
                           <path
                              d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z"
                              id="Combined-Shape" fill="#000000" opacity="0.3" />
                        </g>
                     </svg>
                  </span>
                  <span class="kt-menu__link-text">Pengajuan</span><i
                     class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
                        class="kt-menu__link"><span
                        class="kt-menu__link-text">Pengajuan</span></span></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a
                        href="{{ route('pengajuan_magang_pkl') }}" class="kt-menu__link "><i
                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                        class="kt-menu__link-text">Magang / PKL</span></a></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a
                        href="{{ route('pengajuan_perusahaan') }}"
                        class="kt-menu__link "><i
                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                        class="kt-menu__link-text">Perusahaan</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__item" aria-haspopup="true">
               <a
                  href="{{ route('surat.list') }}" class="kt-menu__link ">
                  <span class="kt-menu__link-icon">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                           <path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" id="Combined-Shape" fill="#000000"></path>
                           <path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" id="Path-41-Copy" fill="#000000" opacity="0.3"></path>
                        </g>
                     </svg>
                  </span>
                  <span class="kt-menu__link-text">Buat Surat</span>
               </a>
            </li>
            <li class="kt-menu__item" aria-haspopup="true">
               <a
                  href="{{ route('unggah_dokumen') }}" class="kt-menu__link ">
                  <span class="kt-menu__link-icon">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                           <rect id="Rectangle-7" fill="#000000" opacity="0.3" x="4" y="5" width="16" height="6" rx="1.5"></rect>
                           <rect id="Rectangle-7-Copy" fill="#000000" x="4" y="13" width="16" height="6" rx="1.5"></rect>
                        </g>
                     </svg>
                  </span>
                  <span class="kt-menu__link-text">Unggah Dokumen</span>
               </a>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
               data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;"
                  class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                     <svg
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                        viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect id="bound" x="0" y="0" width="24" height="24" />
                           <path
                              d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z"
                              id="Combined-Shape" fill="#000000" />
                           <path
                              d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z"
                              id="Combined-Shape" fill="#000000" opacity="0.3" />
                        </g>
                     </svg>
                  </span>
                  <span class="kt-menu__link-text">Riwayat Kegiatan</span><i
                     class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
                        class="kt-menu__link"><span
                        class="kt-menu__link-text">Pengajuan</span></span></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a
                        href="{{ route('riwayat.jurnal.list') }}" class="kt-menu__link "><i
                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                        class="kt-menu__link-text">Jurnal Harian</span></a></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a
                        href="{{ route('riwayat.absensi.list') }}"
                        class="kt-menu__link "><i
                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                        class="kt-menu__link-text">Absensi</span></a>
                     </li>
                     <li class="kt-menu__item " aria-haspopup="true"><a
                        href="{{ route('riwayat.kuesioner.list') }}"
                        class="kt-menu__link "><i
                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                        class="kt-menu__link-text">Kuisioner</span></a>
                     </li>
                     <li class="kt-menu__item " aria-haspopup="true"><a
                        href="{{ route('riwayat.penilaian.list') }}"
                        class="kt-menu__link "><i
                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                        class="kt-menu__link-text">Penilaian</span></a>
                     </li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__section ">
               <h4 class="kt-menu__section-text">Logout</h4>
               <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
               <a
                  href="{{ route('logout') }}" class="kt-menu__link ">
                  <span class="kt-menu__link-icon">
                     <svg
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                        viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <polygon id="Bound" points="0 0 24 0 24 24 0 24" />
                           <path
                              d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                              id="Shape" fill="#000000" fill-rule="nonzero" />
                           <path
                              d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                              id="Path" fill="#000000" opacity="0.3" />
                        </g>
                     </svg>
                  </span>
                  <span class="kt-menu__link-text">Keluar</span>
               </a>
            </li>
         </ul>
      </div>
   </div>
   <!-- end:: Aside Menu -->
</div>
<!-- end:: Aside -->