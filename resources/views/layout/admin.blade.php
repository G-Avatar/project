<div class="row">
    <div class="col-12 d-flex align-items-center justify-content-center mt-3">
        <img src="/storage/assets/dnsc-logo.png" alt="DNSC logo" class="sidebar-img">
        <h1 class="ms-2 mt-2">DNSC</h1>
    </div>
    <div class="col-12 ps-4 pe-4">
        <hr>
    </div>
    <div class="col-12 d-flex mb-1">
        <a href="{{ route('admin-dashboard-page') }}"
            class="h-100 w-100 side-link ps-3 pe-3{{ request()->routeIs('admin-dashboard-page') ? ' activated' : '' }}"><span
                class="mdi mdi-home"></span> Dashboard</a>
    </div>
    <div class="col-12 d-flex">
        <a href="{{ route('admin-area-page') }}" class="h-100 w-100 side-link ps-3 pe-3{{ request()->routeIs('admin-area-page') ? ' activated' : '' }}"><span class="mdi mdi-domain"></span> Area</a>
    </div>
    <div class="col-12">
        <div class="accordion" id="outerAccordion">
            <div class="accordion-item">
              <h2 class="accordion-header" id="panel1Heading">
                <button class="accordion-button collapsed out side-link" type="button" data-bs-toggle="collapse" data-bs-target="#panel1Collapse" aria-expanded="true" aria-controls="panel1Collapse">
                <span class="mdi mdi-account"> Users</span>
                </button>
              </h2>
              <div id="panel1Collapse" class="accordion-collapse collapse ac" aria-labelledby="panel1Heading" data-bs-parent="#outerAccordion">
                <div class="accordion-body ac">
                  <div class="accordion" id="innerAccordion">
                    <div class="accordion-item rounded-pill ac">
                      <h2 class="accordion-header rounded-pill" id="panel2Heading">
                        <button class="accordion-button in-btn side-link rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#panel2Collapse" aria-expanded="true" aria-controls="panel2Collapse">
                          Approval
                        </button>
                      </h2>
                      <div id="panel2Collapse" class="accordion-collapse collapse in-output ac" aria-labelledby="panel2Heading" data-bs-parent="#innerAccordion">
                        <div class="accordion-body ac rounded-pill d-flex flex-column">
                          <a href="" class="side-link rounded m-1 text-center">Pending</a>
                          <a href="" class="side-link rounded m-1 text-center">Rejected</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    {{-- <div class="col-12 accordion border border-0" id="accordionFlushExample">
        <div class="accordion-item border border-0">
            <h2 class="accordion-header border border-0" id="flush-headingTwo">
                <button class="accordion-button collapsed side-link ps-3 pe-3 h-100 w-100 border border-0"
                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                    aria-expanded="false" aria-controls="flush-collapseTwo">
                    <span class="mdi mdi-account"> Users</span>
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse border border-0"
                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body ac">
                    <div class="accordion accordion-flush border-0" id="test">
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                    aria-expanded="false" aria-controls="flush-collapseThree">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree" data-bs-parent="#test">
                                <div class="accordion-body">Placeholder content for this accordion, which is
                                    intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                    third item's accordion body. Nothing more exciting happening here in terms
                                    of content, but just filling up the space to make it look, at least at first
                                    glance, a bit more representative of how this would look in a real-world
                                    application.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>