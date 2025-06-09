// /tests/FormTest.js
import React from 'react';
import { render, fireEvent } from '@testing-library/react';
import Form from '../components/Form';

describe('Form', () => {
  let form;

  beforeEach(() => {
    form = render(<Form />);
  });

  it('should be accessible and easy to fill', () => {
    expect(form.container).toBeInTheDocument();
    expect(form.getByLabelText(/First Name/i)).toBeTruthy();
    expect(form.getByLabelText(/Last Name/i)).toBeTruthy();
    expect(form.getByLabelText(/Email Address/i)).toBeTruthy();
    expect(form.getByLabelText(/Phone Number/i)).toBeTruthy();
    expect(form.getByRole('button', { name: /Submit/i })).toBeTruthy();
  });

  it('should validate the form fields correctly', () => {
    const firstNameInput = form.getByLabelText(/First Name/i);
    const lastNameInput = form.getByLabelText(/Last Name/i);
    const emailAddressInput = form.getByLabelText(/Email Address/i);
    const phoneNumberInput = form.getByLabelText(/Phone Number/i);
    const submitButton = form.getByRole('button', { name: /Submit/i });

    // First Name
    fireEvent.change(firstNameInput, { target: { value: 'Jane' } });
    expect(firstNameInput).toHaveValue('Jane');

    // Last Name
    fireEvent.change(lastNameInput, { target: { value: '' } });
    expect(lastNameInput).not.toHaveValue();

    // Email Address
    fireEvent.change(emailAddressInput, { target: { value: 'jane@example.com' } });
    expect(emailAddressInput).toHaveValue('jane@example.com');

    // Phone Number
    fireEvent.change(phoneNumberInput, { target: { value: '1234567890' } });
    expect(phoneNumberInput).toHaveValue('1234567890');

    // Submit
    submitButton.click();
    expect(form.getByText(/First Name is required/i)).toBeTruthy();
    expect(form.getByText(/Last Name cannot be blank/i)).toBeTruthy();
    expect(form.getByText(/Email Address must be a valid email address/i)).toBeTruthy();
    expect(form.getByText(/Phone Number must be a valid phone number/i)).toBeTruthy();
  });
});