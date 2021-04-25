<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Classes\Complex;

class ComplexTest extends TestCase
{

    /**
     * @return void
     * @dataProvider providerShow
     */
    public function testShow($r1, $i1, $expect)
    {
        $a = new Complex($r1, $i1);

        $this->assertEquals($a->show(),$expect);
    }

    public function providerShow()
    {
        return array (
            array (1.1, -2.2, '1.1-2.2i'),
            array (-1, null, '-1+0i'),
            array (null, '','0+0i'),
            array ('sting', 'string', '0+0i'),
            array (1, 'sting', '1+0i'),
            array ('', -2, '0-2i')
        );
    }

    /**
     * @return void
     * @dataProvider providerAdd
     */
    public function testAdd($r1, $i1, $r2, $i2, $expect)
    {
        $a = new Complex($r1, $i1);
        $b = new Complex($r2, $i2);
        $res = $a->add($b);

        $this->assertEquals($res->show(),$expect);
    }

    public function providerAdd()
    {
        return array (
            array (1.1, 2.2, 3.3, 4.4, '4.4+6.6i'),
            array (-1, 2, null, null, '-1+2i'),
            array (null, '', 3, -4,'3-4i'),
            array ('sting', 'string', -1, 2, '-1+2i'),
            array (1,-2,'sting', 'string', '1-2i'),
            array ('', 'string', -1, -2, '-1-2i')
        );
    }

    /**
     * @return void
     * @dataProvider providerSubtract
     */
    public function testSubtract($r1, $i1, $r2, $i2, $expect)
    {
        $a = new Complex($r1, $i1);
        $b = new Complex($r2, $i2);
        $res = $a->subtract($b);

        $this->assertEquals($res->show(),$expect);
    }    

    public function providerSubtract()
    {
        return array (
            array (1.1, 2.2, 3.3, 4.4, '-2.2-2.2i'),
            array (-1, 2, null, null, '-1+2i'),
            array (null, '', 3, -4,'-3+4i'),
            array ('sting', 'string', -1, 2, '1-2i'),
            array (1,-2,'sting', 'string', '1-2i'),
            array ('', 'string', -1, -2, '1+2i')
        );
    }

    /**
     * @return void
     * @dataProvider providerMultiply
     */
    public function testMultiply($r1, $i1, $r2, $i2, $expect)
    {
        $a = new Complex($r1, $i1);
        $b = new Complex($r2, $i2);
        $res = $a->multiply($b);

        $this->assertEquals($res->show(),$expect);
    }

    public function providerMultiply()
    {
        return array (
            array (1.1, 2.2, 3.3, 4.4, '-6.05+12.1i'),
            array (-1, 2, 3, -4, '5+10i'),
            array (-1, 2, null, null, '0+0i'),
            array (null, '', 3, -4,'0+0i'),
            array ('sting', 'string', -1, 2, '0+0i'),
            array (1,-2,'sting', 'string', '0+0i'),
            array ('', 'string', -1, -2, '0+0i')
        );
    }

    /**
     * @return void
     * @dataProvider providerDivide
     */
    public function testDivide($r1, $i1, $r2, $i2, $expect)
    {
        $a = new Complex($r1, $i1);
        $b = new Complex($r2, $i2);
        $res = $a->divide($b);

        $this->assertEquals($res->show(),$expect);
    }

    public function providerDivide()
    {
        return array (
            array (1.1, 2.2, 3.3, 4.4, '0.44+0.08i'),
            array (-1, 2, 3, -4, '-0.44+0.08i'),
            array (null, '', 3, -4,'0+0i'),
            array ('sting', 'string', -1, 2, '0+0i'),
            array ('', 'string', -1, -2, '0+0i')
        );
    }
}