(function($) {
  $(document).ready(function() {
    const $toggleButton = $('#kissws-simple-tweaks-toggle-all');
    const $checkboxes = $('input[type="checkbox"][name*="kissws_simple_tweaks_options"]');

    $toggleButton.click(function() {
      // Toggle checked state and animate slide using custom class
      $checkboxes.toggleClass('checked', function(index, currentState) {
        $(this).animate({
          marginLeft: currentState ? -20 : 0,
        }, 200, 'easeInOutQuint');
        return !currentState;
      });

      // Update form field values and button color
      $checkboxes.prop('checked', function() {
        return !$(this).prop('checked');
      });
      $toggleButton.toggleClass('active', $checkboxes.is(':checked').length === $checkboxes.length);
    });

    // Initially set active state if all checkboxes are checked
    if ($checkboxes.is(':checked').length === $checkboxes.length) {
      $toggleButton.addClass('active');
    }
  });
})(jQuery);