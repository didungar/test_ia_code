import React from 'react';
import { render, fireEvent } from '@testing-library/react';
import App from './App';

describe('App component', () => {
  it('renders the page title', () => {
    const { getByText } = render(<App />);
    expect(getByText('Page Title')).toBeInTheDocument();
  });

  it('calls the onClick handler when the button is clicked', () => {
    const mockFn = jest.fn();
    const { getByRole } = render(<App onClick={mockFn} />);
    const button = getByRole('button');
    fireEvent.click(button);
    expect(mockFn).toHaveBeenCalledTimes(1);
  });
});