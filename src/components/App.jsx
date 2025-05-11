import React from 'react';
import { render, fireEvent } from '@testing-library/react';
import App from './App';

describe('<App />', () => {
  it('should render the greeting message', () => {
    const { getByText } = render(<App />);
    expect(getByText('Hello, world!')).toBeInTheDocument();
  });

  it('should handle button clicks', () => {
    const { getByRole } = render(<App />);
    fireEvent.click(getByRole('button'));
    expect(getByText('Clicked')).toBeInTheDocument();
  });
});