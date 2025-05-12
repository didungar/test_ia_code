// Import necessary modules
import React from 'react';
import { render } from '@testing-library/react';
import Calculator from './Calculator';

describe('Calculator component', () => {
  let calculator;

  beforeEach(() => {
    // Create a new instance of the Calculator component
    calculator = render(<Calculator />);
  });

  it('should display a button for each operation', () => {
    const buttons = calculator.getByRole('button');
    expect(buttons).toHaveLength(4);
    expect(buttons[0]).toHaveTextContent('+');
    expect(buttons[1]).toHaveTextContent('-');
    expect(buttons[2]).toHaveTextContent('*');
    expect(buttons[3]).toHaveTextContent('/');
  });

  it('should display the result of the operation', () => {
    const addButton = calculator.getByText('+');
    fireEvent.click(addButton);
    const input1 = calculator.getByLabelText('Input 1');
    const input2 = calculator.getByLabelText('Input 2');
    fireEvent.change(input1, { target: { value: '5' } });
    fireEvent.change(input2, { target: { value: '3' } });
    const resultButton = calculator.getByRole('button', { name: /result/i });
    fireEvent.click(resultButton);
    expect(calculator.getByLabelText('Result').textContent).toBe('8');
  });
});