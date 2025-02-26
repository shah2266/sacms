<!-- Topbar Start -->
<div class="container-fluid topbar px-0 px-lg-4 bg-olive-dark py-1 d-none d-lg-block">
    <div class="container">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                <div class="d-flex flex-wrap">
                    @if($company->phone)
                    <div class="border-end border-primary pe-3">
                        <a href="tel:{{ $company->phone }}" class="text-muted small"><i class="fas fa-phone-alt text-primary me-2"></i>{{ $company->phone }}</a>
                    </div>
                    @endif

                    @if($company->email)
                    <div class="ps-3">
                        <a href="mailto:{{ $company->email }}" class="text-muted small"><i class="fas fa-envelope text-primary me-2"></i>{{ $company->email }}</a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-flex justify-content-end">
                    <div class="d-flex border-primary pe-3">
                        @if($company->facebook) <a class="btn p-0 text-primary me-3" href="{{ $company->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a> @endif
                        @if($company->youtube) <a class="btn p-0 text-primary me-3" href="{{ $company->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a> @endif
                        @if($company->linkedin) <a class="btn p-0 text-primary me-3" href="{{ $company->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a> @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

