javascript
import React from 'react';
import { render, fireEvent } from '@testing-library/react';
import { TestCalculator } from './TestCalculator';

describe('TestCalculator', () => {
  it('should sum two numbers correctly', () => {
    const wrapper = render(<TestCalculator />);
    const input1 = wrapper.getByLabelText('Number 1');
    const input2 = wrapper.getByLabelText('Number 2');
    const button = wrapper.getByRole('button');

    fireEvent.change(input1, { target: { value: '5' } });
    fireEvent.change(input2, { target: { value: '3' } });
    fireEvent.click(button);

    expect(wrapper.getByText('8')).toBeInTheDocument();
  });

  it('should subtract two numbers correctly', () => {
    const wrapper = render(<TestCalculator />);
    const input1 = wrapper.getByLabelText('Number 1');
    const input2 = wrapper.getByLabelText('Number 2');
    const button = wrapper.getByRole('button');

    fireEvent.change(input1, { target: { value: '5' } });
    fireEvent.change(input2, { target: { value: '3' } });
    fireEvent.click(button);

    expect(wrapper.getByText('-2')).toBeInTheDocument();
  });
});