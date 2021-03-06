<?php
/*
 * The MIT License
 *
 * Copyright (c) 2010 Johannes Mueller <circus2(at)web.de>
 * Copyright (c) 2012 Toha <tohenk@yahoo.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace MwbExporter\Formatter\Doctrine2\Annotation\Model;

use MwbExporter\Model\Columns as BaseColumns;
use MwbExporter\Writer\WriterInterface;

class Columns extends BaseColumns
{
    public function write(WriterInterface $writer)
    {
        // display column
        foreach ($this->columns as $column) {
            $column->write($writer);
        }
        // display column relations
        foreach ($this->columns as $column) {
            $column->writeRelations($writer);
        }

        return $this;
    }

    public function writeArrayCollections(WriterInterface $writer)
    {
        foreach ($this->columns as $column) {
            $column->writeArrayCollection($writer);
        }

        return $this;
    }

    public function writeGetterAndSetter(WriterInterface $writer)
    {
        // column getter and setter
        foreach ($this->columns as $column) {
            $column->writeGetterAndSetter($writer);
        }
        // column getter and setter for relations
        foreach ($this->columns as $column) {
            $column->writeRelationsGetterAndSetter($writer);
        }

        return $this;
    }
}