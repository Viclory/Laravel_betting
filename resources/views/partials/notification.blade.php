<div class="control-box notification-popup">
    <div class="content-box">
        <div class="text">
            @if (isset($notification_message)) {{ $notification_message }} @else {{ '' }} @endif
        </div>
    </div>
    <footer class="footer">
    </footer>
    <span class="js-close-popup" title="{{ __('common.close') }}"></span>
</div>