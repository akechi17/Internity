export function useStatusButton({ buttonId }) {
    window
        $(`#${buttonId}`).closest("form").trigger("submit");
}
