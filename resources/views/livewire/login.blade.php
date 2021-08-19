<div>
    <div class="form-body">
        @if (session('error'))
            <div class="alert alert-danger dismissable" role="colse">
                <strong>{{ session('error') }}</strong>
            </div>
        @endif
        <form class="row g-3" wire:submit.prevent="login" method="POST">
            <div class="col-12">
                <label for="inputEmailAddress" class="form-label">Email Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model="email" id="inputEmailAddress" placeholder="Email Address">
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12">
                <label for="inputChoosePassword" class="form-label">Enter
                    Password</label>
                <div class="input-group" id="show_hide_password">
                    <input type="password" class="form-control border-end-0 @error('password') is-invalid @enderror" wire:model="password" id="inputChoosePassword"
                        placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i
                            class='bx bx-hide'></i></a>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" wire:model="remember" id="flexSwitchCheckChecked" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                </div>
            </div>
            <div class="col-md-6 text-end"> <a href="authentication-forgot-password.html">Forgot Password ?</a>
            </div>
            <div class="col-12">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <span wire:loading.remove wire:target="login">
                            <i class="bx bxs-lock-open"></i>Sign in
                        </span>
                        <span wire:loading wire:target="login">Loading....</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
