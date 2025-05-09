import React from 'react';
import { render } from '@testing-library/react';
import App from './App';

describe('App', () => {
  it('should handle add operation correctly', () => {
    const { getByText } = render(<App />);
    const buttonAdd = getByText(/add/i);
    fireEvent.click(buttonAdd);
    expect(getByText(/result/i).textContent).toBe('2');
  });

  it('should handle subtract operation correctly', () => {
    const { getByText } = render(<App />);
    const buttonSubtract = getByText(/subtract/i);
    fireEvent.click(buttonSubtract);
    expect(getByText(/result/i).textContent).toBe('1');
  });
});