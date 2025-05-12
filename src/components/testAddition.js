// testAddition.js
import React from 'react';
import { render, fireEvent } from '@testing-library/react';
import Addition from './Addition';

describe('Addition component', () => {
  it('should add two numbers correctly', () => {
    const { getByText } = render(<Addition />);

    // Simulate user input for the first number
    fireEvent.change(getByText(/First number:/i), { target: { value: '5' } });

    // Simulate user input for the second number
    fireEvent.change(getByText(/Second number:/i), { target: { value: '3' } });

    // Trigger button click event
    fireEvent.click(getByText(/Add/i));

    // Check that the result is correct
    expect(getByText('8')).toBeInTheDocument();
  });
});