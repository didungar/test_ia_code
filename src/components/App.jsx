import React from 'react';
import { render, fireEvent } from '@testing-library/react';
import App from './App';

describe('Division', () => {
  it('should divide two numbers correctly', () => {
    const { getByText } = render(<App />);
    const result = getByText(/result/i);

    fireEvent.change(getByText(/dividend/i), { target: { value: '10' } });
    fireEvent.change(getByText(/divisor/i), { target: { value: '2' } });
    fireEvent.click(getByText(/compute/i));

    expect(result.textContent).toBe('5');
  });

  it('should handle division by zero', () => {
    const { getByText } = render(<App />);
    const result = getByText(/result/i);

    fireEvent.change(getByText(/dividend/i), { target: { value: '10' } });
    fireEvent.change(getByText(/divisor/i), { target: { value: '0' } });
    fireEvent.click(getByText(/compute/i));

    expect(result.textContent).toBe('Infinity');
  });
});