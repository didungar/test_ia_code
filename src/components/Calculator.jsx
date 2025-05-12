import React from 'react';
import { render, fireEvent } from '@testing-library/react';
import Calculator from './Calculator';

describe('Calculator', () => {
  let calculator;

  beforeEach(() => {
    calculator = render(<Calculator />);
  });

  it('should subtract two numbers', () => {
    const number1 = calculator.getByTestId('number1');
    const number2 = calculator.getByTestId('number2');
    const subtractButton = calculator.getByTestId('subtract-button');

    fireEvent.change(number1, { target: { value: 10 } });
    fireEvent.change(number2, { target: { value: 5 } });
    fireEvent.click(subtractButton);

    expect(calculator.getByTestId('result')).toHaveTextContent('5');
  });
});