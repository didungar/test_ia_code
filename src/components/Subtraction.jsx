import React from 'react';
import { render, fireEvent } from '@testing-library/react';
import { Subtraction } from './Subtraction';

describe('Subtraction', () => {
  it('should subtract two numbers correctly', () => {
    const wrapper = render(<Subtraction />);
    const number1Input = wrapper.getByLabelText('Number 1');
    const number2Input = wrapper.getByLabelText('Number 2');
    const resultElement = wrapper.getByTestId('result');

    fireEvent.change(number1Input, { target: { value: '5' } });
    fireEvent.change(number2Input, { target: { value: '3' } });

    expect(resultElement).toHaveTextContent('2');
  });
});