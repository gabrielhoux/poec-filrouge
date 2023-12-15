import $ from 'jquery';

export function openModal() {
    $('#loadingModal').addClass('is-active');
}

export function closeModal() {
    $('#loadingModal').removeClass('is-active');
}