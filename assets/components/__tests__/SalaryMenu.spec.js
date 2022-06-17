import { describe, it, expect } from 'vitest'

import { mount } from '@vue/test-utils'
import SalaryMenu from '../SalaryMenu.vue'

describe('SalaryMenu', () => {
  it('renders properly', () => {
    const wrapper = mount(SalaryMenu, { props: { msg: 'Hello Vitest' } })
    expect(wrapper.text()).toContain('Hello Vitest')
  })
})
