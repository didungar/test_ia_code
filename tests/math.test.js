// tests/math.test.js
import React from 'react';
import { render, fireEvent } from '@testing-library/react';
import MathOperations from './MathOperations';

describe('MathOperations component', () => {
  it('should add two numbers correctly', () => {
    const { getByText } = render(<MathOperations operation="add" />);
    const num1Input = getByLabelText(/num1/i);
    const num2Input = getByLabelText(/num2/i);
    const resultOutput = getByText('Result');

    fireEvent.change(num1Input, { target: { value: '5' } });
    fireEvent.change(num2Input, { target: { value: '3' } });

    expect(resultOutput).toHaveTextContent('8');
  });

  it('should subtract two numbers correctly', () => {
    const { getByText } = render(<MathOperations operation="subtract" />);
    const num1Input = getByLabelText(/num1/i);
    const num2Input = getByLabelText(/num2/i);
    const resultOutput = getByText('Result');

    fireEvent.change(num1Input, { target: { value: '5' } });
    fireEvent.change(num2Input, { target: { value: '3' } });

    expect(resultOutput).toHaveTextContent('2');
  });

  it('should multiply two numbers correctly', () => {
    const { getByText } = render(<MathOperations operation="multiply" />);
    const num1Input = getByLabelText(/num1/i);
    const num2Input = getByLabelText(/num2/i);
    const resultOutput = getByText('Result');

    fireEvent.change(num1Input, { target: { value: '5' } });
    fireEvent.change(num2Input, { target: { value: '3' } });

    expect(resultOutput).toHaveTextContent('15');
  });

  it('should divide two numbers correctly', () => {
    const { getByText } = render(<MathOperations operation="divide" />);
    const num1Input = getByLabelText(/num1/i);
    const num2Input = getByLabelText(/num2/i);
    const resultOutput = getByText('Result');

    fireEvent.change(num1Input, { target: { value: '10' } });
    fireEvent.change(num2Input, { target: { value: '2' } });

    expect(resultOutput).toHaveTextContent('5');
  });
});