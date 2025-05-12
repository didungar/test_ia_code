import { useState } from 'react';
import { render, fireEvent } from '@testing-library/react';
import Calculator from './Calculator';

describe('Calculator', () => {
  it('should calculate the sum of two numbers', () => {
    const { getByText, getByLabelText } = render(<Calculator />);
    const number1Input = getByLabelText(/number1/i);
    const number2Input = getByLabelText(/number2/i);
    const sumButton = getByText('Sum');

    fireEvent.change(number1Input, { target: { value: '5' } });
    fireEvent.change(number2Input, { target: { value: '3' } });
    fireEvent.click(sumButton);

    const result = getByText(/result/i).textContent;
    expect(result).toBe('8');
  });
});